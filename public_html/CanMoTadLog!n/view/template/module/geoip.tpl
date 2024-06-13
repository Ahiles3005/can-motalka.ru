<?php echo $header; ?>
    <div id="content">
<div class="breadcrumb">
<?php foreach ($breadcrumbs as $i=> $breadcrumb) { ?>
<?php if($i+1<count($breadcrumbs)) { ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a> <?php } else { ?><?php echo $breadcrumb['text']; ?><?php } ?>
<?php } ?>
</div>
        <div id="warning" class="warning" style="display: none;"></div>
        <div id="success" class="success" style="display: none;"></div>
        <div class="box">
            <div class="heading">
                <h1>
                    <img src="view/image/module.png" alt=""/> <?php echo $heading_title; ?></h1>

                <div class="buttons">
                    <a class="button submit-forms"><?php echo $button_save; ?></a>
                    <a href="<?php echo $cancel; ?>" class="button"><?php echo $button_cancel; ?></a>
                </div>
            </div>
            <div class="content">
                <div id="tabs" class="htabs">
                    <a href="#tab-general"><?php echo $tab_general; ?></a>
                    <a href="#tab-popups"><?php echo $tab_popup; ?></a>
                    <a href="#tab-messages"><?php echo $tab_messages; ?></a>
                    <a href="#tab-redirects"><?php echo $tab_redirects; ?></a>
                    <a href="#tab-currencies"><?php echo $tab_currencies; ?></a>
                    <a href="#tab-regions"><?php echo $tab_regions; ?></a>
                </div>
                <div id="tab-general">
                    <?php include(DIR_TEMPLATE . 'module/geoip/general.tpl'); ?>
                </div>
                <div id="tab-popups">
                    <?php include(DIR_TEMPLATE . 'module/geoip/popup.tpl'); ?>
                </div>
                <div id="tab-messages">
                    <?php include(DIR_TEMPLATE . 'module/geoip/messages.tpl'); ?>
                </div>
                <div id="tab-redirects">
                    <?php include(DIR_TEMPLATE . 'module/geoip/redirects.tpl'); ?>
                </div>
                <div id="tab-currencies">
                    <?php include(DIR_TEMPLATE . 'module/geoip/currencies.tpl'); ?>
                </div>
                <div id="tab-regions">
                    <?php include(DIR_TEMPLATE . 'module/geoip/zone_fias.tpl'); ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Шаблон -->
<select id="select-countries" style="display: none;">
    <option value="0"><?php echo $text_none; ?></option>
    <?php foreach ($countries as $country) { ?>
        <option value="<?php echo $country['country_id']; ?>">
            <?php echo $country['name']; ?>
        </option>
    <?php } ?>
</select>
<script type="text/javascript"><!--
    function savePopups() {
        var form = $('#tab-popups').find('form');
        form.find('.error').remove();
        $.post(form.attr('action'), form.serialize(),
            function(json) {
                if (json.errors) {
                    for (i in json.errors.cities) {
                        $('#city-row' + i).find('td:first').append('<p class="error">' + json.errors.cities[i] + '</p>');
                    }
                    $('#tabs').find('a[href="#tab-popups"]').click();
                    return;
                }

                saveMessages();
            }, 'json');
    }

    function saveMessages() {
        var form = $('#tab-messages').find('form');
        form.find('.error').remove();
        $.post(form.attr('action'), form.serialize(),
            function(json) {
                if (json.errors) {
                    for (i in json.errors.key) {
                        $('#rule-row' + i).find('td:first').append('<p class="error">' + json.errors.key[i] + '</p>');
                    }
                    for (i in json.errors.fias) {
                        $('#rule-row' + i).find('td:eq(1)').append('<p class="error">' + json.errors.fias[i] + '</p>');
                    }
                    $('#tabs').find('a[href="#tab-messages"]').click();
                    return;
                }

                saveRedirects();
            }, 'json');
    }

    function saveRedirects() {
        var form = $('#tab-redirects').find('form');
        form.find('.error').remove();
        $.post(form.attr('action'), form.serialize(),
            function(json) {
                if (json.errors) {
                    for (i in json.errors.fias) {
                        $('#redirect-row' + i).find('td:eq(0)').append('<p class="error">' + json.errors.fias[i] + '</p>');
                    }
                    for (i in json.errors.subdomain) {
                        $('#redirect-row' + i).find('td:eq(1)').append('<p class="error">' + json.errors.subdomain[i] + '</p>');
                    }
                    $('#tabs').find('a[href="#tab-redirects"]').click();
                    return;
                }

                saveCurrencies();
            }, 'json');
    }

    function saveCurrencies() {
        var form = $('#tab-currencies').find('form');
        form.find('.error').remove();
        $.post(form.attr('action'), form.serialize(),
            function(json) {
                if (json.errors) {
                    for (i in json.errors.country) {
                        $('#currency-row' + i).find('td:eq(0)').append('<p class="error">' + json.errors.country[i] + '</p>');
                    }
                    for (i in json.errors.code) {
                        $('#currency-row' + i).find('td:eq(1)').append('<p class="error">' + json.errors.code[i] + '</p>');
                    }
                    $('#tabs').find('a[href="#tab-currencies"]').click();
                    return;
                }

                saveRegions();
            }, 'json');
    }

    function saveRegions() {
        var form = $('#tab-regions').find('form');
        form.find('.error').remove();
        $.post(form.attr('action'), form.serialize(),
            function(json) {
                if (json.errors) {
                    for (i in json.errors.country) {
                        $('#zone-fias-row' + i).find('td:eq(0)').append('<p class="error">' + json.errors.country[i] + '</p>');
                    }
                    $('#tabs').find('a[href="#tab-regions"]').click();
                    return;
                }

                $('#success').text(json.success).show();
            }, 'json');
    }

    $(function() {
        $('.submit-forms').click(function() {
            $('#warning, #success').hide().text('');
            var form = $('#tab-general').find('form');
            $.post(form.attr('action'), form.serialize() + '&' + $('.for-general-form :input').serialize(),
                function(json) {
                    if (json.warning) {
                        $('#warning').text(json.warning).show();
                        $('#tabs').find('a[href="#tab-general"]').click();
                        return;
                    }

                    savePopups();
                }, 'json');
        });

        $('form').submit(function(e) {
            e.preventDefault();
        });
    });

    $('#rules, #redirects, #cities, #zone_fias').on('focus', '.row-fias-name', function() {
        if (!$(this).data('autocomplete')) {
            addAutocomplete($(this));
        }
    });

    $('.row-fias-name').each(function() {
        addAutocomplete($(this));
    });

    function addAutocomplete(el) {
        el.autocomplete({
            source:    'index.php?route=module/geoip/search&token=<?php echo $token; ?>',
            minLength: 2,
            select:    function(e, ui) {
                $(this).next('.row-fias-id').val(ui.item.fias_id);
            }
        });
    }

    $('#tabs').find('a').tabs();
//--></script>
<?php echo $footer; ?>