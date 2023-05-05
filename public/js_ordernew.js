var selectedRow = null

function onFormSubmit() {
    if (validate()) {
        var formData = readFormData();
        if (selectedRow == null)
            insertNewRecord(formData);
        else
            updateRecord(formData);
        resetForm();
    }
}

function readFormData() {
    var formData = {};
    formData["kodeorder"] = document.getElementById("kodeorder").value;
    formData["kodeproduk"] = document.getElementById("kodeproduk").value;
    formData["namaproduk"] = document.getElementById("namaproduk").value;
    formData["qty"] = document.getElementById("qty").value;
    formData["peritem"] = document.getElementById("peritem").value;
    formData["total"] = document.getElementById("total").value;
    formData["code1"] = document.getElementById("code1").value;
    formData["code2"] = document.getElementById("code2").value;
    return formData;
}

function insertNewRecord(data) {
    var table = document.getElementById("employeeList").getElementsByTagName('tbody')[0];
    var newRow = table.insertRow(table.length);
    cell1 = newRow.insertCell(0);
    cell1.innerHTML = data.kodeorder;
    cell2 = newRow.insertCell(1);
    cell2.innerHTML = data.kodeproduk;
    cell3 = newRow.insertCell(2);
    cell3.innerHTML = data.namaproduk;
    cell4 = newRow.insertCell(3);
    cell4.innerHTML = data.qty;
    cell5 = newRow.insertCell(4);
    cell5.innerHTML = data.peritem;
    cell6 = newRow.insertCell(5);
    cell6.innerHTML = data.total;
    cell7 = newRow.insertCell(6);
    cell7.innerHTML = data.code1;
    cell8 = newRow.insertCell(7);
    cell8.innerHTML = data.code2;
    cell8 = newRow.insertCell(8);
    cell8.innerHTML = `<button onClick="onEdit(this)">Edit</button> <button onClick="onDelete(this)">Delete</button>`;
}

function resetForm() {
    document.getElementById("kodeorder").value = "";
    document.getElementById("kodeproduk").value = "";
    document.getElementById("namaproduk").value = "";
    document.getElementById("qty").value = "";
    document.getElementById("peritem").value = "";
    document.getElementById("total").value = "";
    document.getElementById("code1").value = "";
    document.getElementById("code2").value = "";
    selectedRow = null;
}

function onEdit(td) {
    selectedRow = td.parentElement.parentElement;
    document.getElementById("kodeorder").value = selectedRow.cells[0].innerHTML;
    document.getElementById("kodeproduk").value = selectedRow.cells[1].innerHTML;
    document.getElementById("namaproduk").value = selectedRow.cells[2].innerHTML;
    document.getElementById("qty").value = selectedRow.cells[3].innerHTML;
    document.getElementById("peritem").value = selectedRow.cells[4].innerHTML;
    document.getElementById("total").value = selectedRow.cells[5].innerHTML;
    document.getElementById("code1").value = selectedRow.cells[6].innerHTML;
    document.getElementById("code2").value = selectedRow.cells[7].innerHTML;
}
function updateRecord(formData) {
    selectedRow.cells[0].innerHTML = formData.kodeorder;
    selectedRow.cells[1].innerHTML = formData.kodeproduk;
    selectedRow.cells[2].innerHTML = formData.namaproduk;
    selectedRow.cells[3].innerHTML = formData.qty;
    selectedRow.cells[4].innerHTML = formData.peritem;
    selectedRow.cells[5].innerHTML = formData.total;
    selectedRow.cells[6].innerHTML = formData.code1;
    selectedRow.cells[7].innerHTML = formData.code2;
}

function onDelete(td) {
    if (confirm('Are you sure to delete this record ?')) {
        row = td.parentElement.parentElement;
        document.getElementById("employeeList").deleteRow(row.rowIndex);
        resetForm();
    }
}
function validate() {
    isValid = true;
    if (document.getElementById("kodeorder").value == "") {
        isValid = false;
        document.getElementById("kodeorderValidationError").classList.remove("hide");
    } else {
        isValid = true;
        if (!document.getElementById("kodeorderValidationError").classList.contains("hide"))
            document.getElementById("kodeorderValidationError").classList.add("hide");
    }
    return isValid;
}