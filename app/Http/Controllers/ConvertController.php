    /**
     * Возвращает пары валют
     * @return Rate[]|\Illuminate\Database\Eloquent\Collection
     */
    function getpairs()
    {
        $rates = Rate::all('pair');
        return $rates;
    }
