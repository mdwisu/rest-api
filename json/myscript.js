// const mahasiswa = {
//     nama : "dwo",
//     nrp : "12313",
//     email : "dwi@sdf.co"
// }

// // obj to JSON
// console.log(JSON.stringify(mahasiswa));


// // JSON to obj
// let xhr = new XMLHttpRequest();
// xhr.onreadystatechange = function () {
//     if (xhr.readyState == 4 && xhr.status == 200) {
//         let mahasiswa = JSON.parse(this.responseText);
//         console.log(mahasiswa);
//     }
// }
// xhr.open('GET', 'coba.json', true);
// xhr.send();

$.getJSON('coba.json', function (data) {
    console.log(data);
});