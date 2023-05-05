// let id = null
// const makeVariable = (id) => {
//     eval(`const ${id} = document.querySelector{"#${id}"}`)
// }
// const input = (id, type='text', label='', placeholder='')=>{
//     return `
//     <label>${label}</label><br>
//     <input type="${type}" id="${id}" placeholder="${placeholder}"><br>`
//     makeVariable(id)
// }
// const button = (id,label)=>{
//     return `<button id="${id}">${label}</button>`
//     makeVariable(id)
// }

// const div = (id) => {
//     return `<div id="${id}"></div>`
//     makeVariable(id)
// }
// const editData = (index) =>{
//     kodecust.value = data[index].kode
//     namacust.value = data[index].nama
//     id = index
// }
// const deleteData = (index)=>{
//     data.splice(index,1)
//     loadData(data,dataList)
// }
// const loadData =(data, element)=>{
//     element.innerHTML =''
//     let i=0
//     data.forEach(item => {
//         element.innerHTML += `
//         // <table>
//         //     <thead>
//         //         <tr>
//         //             <th>Kode Cust</th>
//         //             <th>Nama Cust</th>
//         //             <th colspan="2">Action</th>
//         //         </tr>
//         //     </thead>
//         //     <tbody>
//         //         <tr>
//         //             <td>${item,kode}</td>
//         //             <td>${item,nama}</td>
//         //             <td><button onclick ="editData(${i})">edit</button></td>
//         //             <td><button onclick ="deleteData(${i})">delete</button></td>
//         //     </tbody>
//         // </table>
        
//         <p>Kode Cust : ${item,kode}</p>
//         <p>Nama Cust : ${item,nama}</p> <br>
//         <button onclick ="editData(${i})">edit</button>
//         <button onclick ="deleteData(${i})">delete</button>
//         `
//         i++
//     });
// }
// const clear = ()=>{
//     kodecust.value = null
//     namacust.value = null
//     id = null
// }
// let data = [
//     {
//         'kode' : 031,
//         'nama' : 'Paji'
//     },
//     {
//         'kode' : 032,
//         'nama' : 'Hyunsuk'
//     }
// ]

// document.body.innerHTML += input('kodecust','number','Kode Cust','Input Kode Cust')
// document.body.innerHTML += input('namacust','text','Nama Cust','Input Nama Cust')
// document.body.innerHTML += button('btnSimpan','Simpan')
// document.body.innerHTML += button('btnClear','Clear')
// document.body.innerHTML += div('dataList')
// loadData(data, dataList)
// btnClear.addEventListener('click',()=>{
//     clear()
// })
// btnSimpan.addEventListener('click',()=>{
//     if(id == null){
//         data.push({
//             'kode' : kodecust.value,
//             'nama' : namacust.value  
//         })
//         clear()
//     }else{
//         data[id].kode = kodecust
//         data[id].nama = namacust
//     }
//     loadData(data,dataList)
// })

var selectedRow = null

function onFormSubmit(e) {
	event.preventDefault();
        var formData = readFormData();
        if (selectedRow == null){
            insertNewRecord(formData);
		}
        else{
            updateRecord(formData);
		}
        resetForm();    
}

//Retrieve the data
function readFormData() {
    var formData = {};
    formData["customerCode"] = document.getElementById("customerCode").value;
    formData["customer"] = document.getElementById("customer").value;
    formData["telp"] = document.getElementById("telp").value;
    formData["email"] = document.getElementById("email").value;
    formData["alamatcust"] = document.getElementById("alamatcust").value;
    return formData;
}

//Insert the data
function insertNewRecord(data) {
    var table = document.getElementById("storeList").getElementsByTagName('tbody')[0];
    var newRow = table.insertRow(table.length);
    cell1 = newRow.insertCell(0);
		cell1.innerHTML = data.customerCode;
    cell2 = newRow.insertCell(1);
		cell2.innerHTML = data.customer;
    cell3 = newRow.insertCell(2);
		cell3.innerHTML = data.telp;
    cell4 = newRow.insertCell(3);
		cell4.innerHTML = data.email;
    cell5 = newRow.insertCell(4);
		cell5.innerHTML = data.alamatcust;
    cell5 = newRow.insertCell(5);
        cell5.innerHTML = `<button onClick="onEdit(this)">Edit</button> <button onClick="onDelete(this)">Delete</button>`;
}

//Edit the data
function onEdit(td) {
    selectedRow = td.parentElement.parentElement;
    document.getElementById("customerCode").value = selectedRow.cells[0].innerHTML;
    document.getElementById("customer").value = selectedRow.cells[1].innerHTML;
    document.getElementById("telp").value = selectedRow.cells[2].innerHTML;
    document.getElementById("email").value = selectedRow.cells[3].innerHTML;
    document.getElementById("alamatcust").value = selectedRow.cells[4].innerHTML;
}
function updateRecord(formData) {
    selectedRow.cells[0].innerHTML = formData.customerCode;
    selectedRow.cells[1].innerHTML = formData.customer;
    selectedRow.cells[2].innerHTML = formData.telp;
    selectedRow.cells[3].innerHTML = formData.email;
    selectedRow.cells[4].innerHTML = formData.alamatcust;
}

//Delete the data
function onDelete(td) {
    if (confirm('Do you want to delete this record?')) {
        row = td.parentElement.parentElement;
        document.getElementById('storeList').deleteRow(row.rowIndex);
        resetForm();
    }
}

//Reset the data
function resetForm() {
    document.getElementById("customerCode").value = '';
    document.getElementById("customer").value = '';
    document.getElementById("telp").value = '';
    document.getElementById("email").value = '';
    document.getElementById("alamatcust").value = '';
    selectedRow = null;
}
