var codeup = new Date(2014, 1, 4, 9, 0, 0);
console.log(codeup.toString()); // Tue Feb 04 2014 09:00:00 GMT-0600 (CST)

var now = moment().format('[my year is ] YYYY');
console.log(now);


moment().startOf('day').fromNow(); 