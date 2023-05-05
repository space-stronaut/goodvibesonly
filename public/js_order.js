var selectedRow = null

function onFormSubmit(e) {
  form.addEventListener('submit',(event) => { 
    event.preventDefault();
        var formData = readFormData();
        if (selectedRow == null){
            insertNewRecord(formData);
		}
        else{
            updateRecord(formData);
		}
        resetForm();
  })  
}

//Retrieve the data
function readFormData() {
    var formData = {};
    formData["kode-order"] = document.getElementById("kode-order").value;
    formData["kode-produk"] = document.getElementById("kode-produk").value;
    formData["nama-produk"] = document.getElementById("nama-produk").value;
    formData["qty"] = document.getElementById("qty").value;
    formData["perprice"] = document.getElementById("perprice").value;
    formData["totalprice"] = document.getElementById("totalprice").value;
    formData["tipe-delivery"] = document.getElementById("tipe-delivery").value;
    formData["status"] = document.getElementById("status").value;
    return formData;
}

//Insert the data
function insertNewRecord(data) {
    var table = document.getElementById("storeList").getElementsByTagName('tbody')[0];
    var newRow = table.insertRow(table.length);
    cell1 = newRow.insertCell(0);
		  cell1.innerHTML = data.kode-order;
    cell2 = newRow.insertCell(1);
		  cell2.innerHTML = data.kode-produk;
    cell3 = newRow.insertCell(2);
		  cell3.innerHTML = data.nama-produk;
    cell4 = newRow.insertCell(3);
		  cell4.innerHTML = data.qty;
    cell5 = newRow.insertCell(4);
		  cell5.innerHTML = data.perprice;
    cell6 = newRow.insertCell(5);
		  cell6.innerHTML = data.totalprice;
    cell7 = newRow.insertCell(6);
		  cell7.innerHTML = data.tipe-delivery;
    cell8 = newRow.insertCell(7);
		  cell8.innerHTML = data.status;
    cell8 = newRow.insertCell(8);
        cell8.innerHTML = `<button onClick="onEdit(this)">Edit</button> <button onClick="onDelete(this)">Delete</button>`;
}

//Edit the data
function onEdit(td) {
    selectedRow = td.parentElement.parentElement;
    document.getElementById("kode-order").value = selectedRow.cells[0].innerHTML;
    document.getElementById("kode-produk").value = selectedRow.cells[0].innerHTML;
    document.getElementById("nama-produk").value = selectedRow.cells[1].innerHTML;
    document.getElementById("qty").value = selectedRow.cells[2].innerHTML;
    document.getElementById("perprice").value = selectedRow.cells[3].innerHTML;
    document.getElementById("totalprice").value = selectedRow.cells[3].innerHTML;
    document.getElementById("tipe-delivery").value = selectedRow.cells[3].innerHTML;
    document.getElementById("status").value = selectedRow.cells[3].innerHTML;
}
function updateRecord(formData) {
    selectedRow.cells[0].innerHTML = formData.kode-order;
    selectedRow.cells[1].innerHTML = formData.kode-produk;
    selectedRow.cells[2].innerHTML = formData.nama-produk;
    selectedRow.cells[3].innerHTML = formData.qty;
    selectedRow.cells[4].innerHTML = formData.perprice;
    selectedRow.cells[5].innerHTML = formData.totalprice;
    selectedRow.cells[6].innerHTML = formData.tipe-delivery;
    selectedRow.cells[7].innerHTML = formData.status;
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
    document.getElementById("kode-order").value = '';
    document.getElementById("kode-produk").value = '';
    document.getElementById("nama-produk").value = '';
    document.getElementById("qty").value = '';
    document.getElementById("perprice").value = '';
    document.getElementById("totalprice").value = '';
    document.getElementById("tipe-delivery").value = '';
    document.getElementById("status").value = '';
    selectedRow = null;
}
