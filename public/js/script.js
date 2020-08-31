(function () {
    /**
     *  Обработка нажатия на Конвертацию
     */
    $('#exchangeForm').submit(function () {
        var data = $(this).serialize();
        $.ajax({
            url: '/exchange',
            data: data,
            dataType: 'json',
            success: function (data) {
                $('#result').text(data);
                $('.currency').text($('#rateTo option:selected').val());
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
})();