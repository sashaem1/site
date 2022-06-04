let timer_show = document.getElementById("timer");
let main_date = document.getElementsByClassName("date")[0];
 
// Функция для вычисления разности времени
function diffSubtract(date1, date2) {
    return date2 - date1;
}
 
// Массив данных о времени
let end_date = {
    "full_year": "2022", // Год
    "month": "05", // Номер месяца
    "day": "27", // День
    "hours": "15", // Час
    "minutes": "52", // Минуты
    "seconds": "00" // Секунды
}
 
// Строка для вывода времени
let end_date_str = `${end_date.full_year}-${end_date.month}-${end_date.day}T${end_date.hours}:${end_date.minutes}:${end_date.seconds}`;

main_date.innerHTML= "<p>Дата наступления</p><p>"+ end_date.full_year+" " + end_date.month+" " + end_date.day+" "+end_date.hours+":"+end_date.minutes+":"+end_date.seconds+"</p>";
// Запуск интервала таймера
timer = setInterval(function () {
    // Получение времени сейчас
    let now = new Date();
    // Получение заданного времени
    let date = new Date(end_date_str);
    
    // Вычисление разницы времени 
    let ms_left = diffSubtract(now, date);
    console.log("DSAD");
    // Если разница времени меньше или равна нулю 
    if (ms_left <= 0) { // То
        // Выключаем интервал
        clearInterval(timer);
        // Выводим сообщение об окончание
        alert("Время закончилось");
    } else { // Иначе
        // Получаем время зависимую от разницы
        let res = new Date(ms_left);
        // Делаем строку для вывода
        let str_timer = `${res.getUTCDate() - 1} ${res.getUTCHours()}:${res.getUTCMinutes()}:${res.getUTCSeconds()}`;
        // Выводим время
        timer_show.innerHTML = "<p>Оставшееся время</p><p>"+str_timer+"</p>";
    }
}, 1000)
