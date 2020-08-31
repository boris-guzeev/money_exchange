<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Обмен валют</title>
    <link rel="stylesheet" href="{{mix('/css/app.css')}}">
</head>
<body>
<form id="exchangeForm" class="container">
    <h2>Валютный калькулятор</h2>
    <div class="row">
        <div class="col-7">
            <div class="row" style="margin-bottom: 15px;">
                <label for="sum">Обменять</label>
                <input type="text" name="sum" id="sum" class="form-control"/>
            </div>
            <div class="row">
                <div class="col-5">
                    <label>Из</label>
                    <select name="rateFrom" id="rateFrom">
                        <option>Выбрать</option>
                    </select>
                </div>
                <div class="col-2">
                    <button type="submit" class="btn btn-primary" id="convertButton">Перевести</button>
                </div>
                <div class="col-5">
                    <label for="rateTo">В</label>
                    <select name="rateTo" id="rateTo">
                        <option>Выбрать</option>
                    </select>
                </div>
                <input type="hidden" name="pair" id="pair"/>
            </div>
        </div>
        <div class="col-5">
            <label>Вы получите:</label>
            <p>
                <span id="result"></span> <span class="currency"></span>
            </p>
            <p>
                1 <span id="currencyName">$</span> = <span id="currencyRate"></span>
            </p>
        </div>
    </div>
    <div class="row" id="messages"></div>
</form>
<script type="text/javascript" src="{{mix("/js/app.js")}}"></script>
<script type="text/javascript" src="/js/script.js"></script>
</body>
</html>