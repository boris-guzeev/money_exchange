(function () {
    /**
     *  Обработка нажатия на Конвертацию
     */
    $('#exchangeForm').submit(function () {
        var data = $(this).serialize();
        $.ajax({
            url: '/exchange',
            data: data,
            success: function (data) {
                $('#result').text(data);
                $('.currency').text($('#rateTo option:selected').val());

                $.ajax({
                    url: '/exchange',
                    data: {
                        sum: 1,
                        rateFrom: $('#rateFrom option:selected').val(),
                        rateTo: $('#rateTo option:selected').val(),
                        pair: $('#pair').val()
                    },
                    success: function (data) {
                        $('#currencyRate').text(data);
                    }
                });
            }
        });
        return false;
    });

    /**
     * Запрос пар валют
     */
    $.ajax({
        url: '/get-pairs',
        dataType: 'json',
        success: function (data) {
            let currency = [];
            window.pairs = [];
            data.map(function (item) {
                window.pairs.push(item.pair);
                let i = item.pair.split('/');
                if (currency.indexOf(i[0]) == -1) {
                    currency.push(i[0]);
                }
                if (currency.indexOf(i[1]) == -1) {
                    currency.push(i[1]);
                }
            });
            // заполним селекты
            currency.map(function (item) {
                $('#rateFrom').append($("<option />").val(item).text(item));
            });
            currency.reverse().map(function (item) {
                $('#rateTo').append($("<option />").val(item).text(item));
            });
        }
    });

    /**
     * Формирование данных по конвертации валюты перед отправкой на конвертирование на бэк
     */
    $('#rateFrom, #rateTo').on('change', function () {
        let temp = $('#rateFrom').val() + '/' + $('#rateTo').val();

        if (window.pairs.indexOf(temp) != -1) {
            $('#pair').val(temp);
        } else {
            $('#pair').val($('#rateTo').val() + '/' + $('#rateFrom').val());
        }
    });

    /**
     * Взаимоисключение одинаковых валют
     */
    $('#rateFrom, #rateTo').on('change', function (event) {
        let selectedRate = $(this).find('option:selected').val();
        if ($(event.target).attr('id') == 'rateFrom') {
            $('#rateTo option').css('display', 'block');
            $('#rateTo option[value="' + selectedRate + '"]').css('display', 'none');
        } else if ($(event.target).attr('id') == 'rateTo') {
            $('#rateFrom option').css('display', 'block');
            $('#rateFrom option[value="' + selectedRate + '"]').css('display', 'none');
        }
    });

    // добавление названия валюты
    $('#rateTo').on('change', function () {
        $('#currencyName').text($(this).children('option:selected:not(:first-child)').val());
    });
})();