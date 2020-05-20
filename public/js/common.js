function getTime() {
     let now = new Date();
     let day = now.getDate();
     let hour = now.getHours();
     let min = now.getMinutes();
     let date = now.getDay();
     let month = now.getMonth() + 1;
     let year = now.getUTCFullYear();

     return `${checkNum(hour)}:${checkNum(min)} T${date + 1} ${checkNum(day)}/${checkNum(month)}/${year}`;
}

function checkNum(item) {
     if (parseInt(item) < 10) {
          return `0${item}`
     }

     return item;
}