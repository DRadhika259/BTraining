// "use strict";

// // Creates id
// function getid() {
//   return parseInt(Date.now() + Math.random());
// }

// function saveTourist() {
//   var keys = ["name", "place", "email", "phno"];
//   var obj = {};

//   keys.forEach(function (item, index) {
//     var result = document.getElementById(item).value;
//     if (result) {
//       obj[item] = result;
//     }
//   });

//   if (Object.keys(obj).length) {
//     var tourists = getTourists();
//     obj.id = getid();
//     tourists.push(obj);
//     var records = JSON.stringify(tourists);
//     localStorage.setItem("tourists", records);
//     clearForm();
//     insertIntoTable(obj, getTotalRows());
//     $("#addTouristModal").modal("hide");
//   }

// }
// //Clearing form data
// function clearForm() {
//   $("#input_form")[0].reset();
// }

// //Retrieving tourist data from local storage
// function getTourists() {
//   var touristData = localStorage.getItem("tourists");
//   var tourists = [];
//   if (!touristData) {
//     return tourists;
//   } else {
//     tourists = JSON.parse(touristData);
//     return tourists;
//   }
// }

// // Displaying data

// function getTouristData(){
//   $("#tourist-entry").find("tr:not:(:first)").remove();

// }

// // Data insertion

// function insertData(item, tableIndex) {
//   var table = document.getElementById("tourist-entry");
//   var row = table.insertRow();
//   idBlock = row.insertIntoCell(0);
//   nameBlock = row.insertIntoCell(1);
//   placeBlock = row.insertIntoCell(2);
//   emailBlock = row.insertIntoCell(3);
//   phonenoBlock = row.insertIntoCell(4);
//   actionBlock = row.insertIntoCell(5);

//   idBlock.innerHTML = tableIndex;
//   nameBlock.innerHTML = item.name;
//   placeBlock.innerHTML = item.place;
//   emailBlock.innerHTML = item.email;
//   phonenoBlock.innerHTML = item.phno;
//   var getid = item.id;

//   actionBlock.innerHTML =
//     '<button class="btn btn-sm btn-default" onclick="showTourist(' +
//     getid +
//     ')">View</button>' +
//     '<button class="btn btn-sm btn-primary" onclick="showEditModal(' +
//     getid +
//     ')">Edit</button>' +
//     '<button class="btn btn-sm btn-danger" onclick="showDeleteModal(' +
//     getid +
//     ')">Delete</button>';
// }

// function getTotalRowCount() {
//   var table = document.getElementById("tourist-entry");
//   return table.row.length;
// }

// function showTourist(id) {
//   var allTourists = getTourists();
//   var tourist = allTourists.find(function (item) {
//     return item.id == id;
//   });

//   $("#showName").val(tourist.name);
//   $("#showPlace").val(tourist.place);
//   $("#showEmail").val(tourist.email);
//   $("#showPhno").val(tourist.phno);
//   $("#showTouristModal").modal();
// }

// function showEditModal(id) {
//   var allTourists = getTourists();
//   var tourist = allTourists.find(function (item) {
//     return item.id == id;
//   });

//   $("#editName").val(tourist.name);
//   $("#editPlace").val(tourist.place);
//   $("#editEmail").val(tourist.email);
//   $("#editPhno").val(tourist.phno);
//   $("#tourist_id").val(tourist.phno);

//   $("#editTouristModal").modal();
// }

// function updateTourist() {
//   var allTourist = getTourists();
//   var touristId = $("#tourist_id").val();

//   var tourist = allTourist.find(function (item) {
//     return item.id == touristId;
//   });

//   tourist.name = $("#editName").val();
//   tourist.place = $("#editPlace").val();
//   tourist.email = $("#editEmail").val();
//   tourist.phno = $("#editPhno").val();

//   var data = JSON.stringify(allTourist);
//   localStorage.setItem("tourists", data);

//   $("#tourist-entry").find("tr:not(:first)").remove();
//   getTableData();
//   $("#editTouristModal").modal("hide");
// }

// function showDeleteModal(id) {
//   $("#deleted-tourist-id").val(id);
//   $("#deleteTourist").modal();
// }

// function deleteTouristData() {
//   var id = $("#deleted-tourist-id").val();
//   var allTourists = getTourists();

//   var storeUser = JSON.parse(localStorage.getItem("tourists"));

//   var newRecord = [];

//   newRecord = storeUser.filter(function (item, index) {
//     return item.id != id;
//   });

//   var record = JSON.stringify(newRecord);

//   localStorage.setItem("tourist", record);
//   $("#tourist-entry").find("tr:not(:first)").remove();
//   $("#deleteTourist").modal("hide");
//   getTableData();
// }
