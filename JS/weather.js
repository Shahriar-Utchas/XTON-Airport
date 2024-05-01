const temp = document.getElementById("temp");
const apikey = "f071e0abed67d1f5ac429c9ff482395a";

function getWeather(city= "Dhaka"){
    const apiUrl = `https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${apikey}`;
    fetch(apiUrl)
    .then((response) => response.json())
    .then((data) => {
        tempeture = data.main.temp;
        temp.innerHTML = convertToCelsius(tempeture) + "°C";
    })
    .catch((error) => {
        console.log("Error: ", error);
    });
}
getWeather();

function convertToCelsius(temp) {
    return Math.round(temp - 273.15);
}

