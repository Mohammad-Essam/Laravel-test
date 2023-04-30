const fileInput = document.getElementById('fileInput');

const uploadButton = document.getElementById('uploadButton');
uploadButton.addEventListener('click', uploadData);
let mapping = [0,1,2];
let excelData = null
fileInput.addEventListener('change', handleFile);

const mappingTable = document.getElementById('mappingTable');
const productNameInput = document.getElementById('productName');
const productTypeInput = document.getElementById('productType');
const productQtyInput = document.getElementById('productQuantity');

productNameInput.addEventListener('change', setMapping);
productTypeInput.addEventListener('change', setMapping);
productQtyInput.addEventListener('change', setMapping);
function setMapping(event)
{
    mapping[0] = productNameInput.value;
    mapping[1] = productTypeInput.value;
    mapping[2] = productQtyInput.value;
}

// Define the handleFile function
  function handleFile(event) {
  const file = event.target.files[0];
  // Create a new FileReader object
  const reader = new FileReader();

  reader.onload = function(event) {
    const data = event.target.result;
    const workbook = XLSX.read(data, { type: 'binary' });
    // Get the first worksheet in the workbook
    const worksheet = workbook.Sheets[workbook.SheetNames[0]];
    // Convert the worksheet to a JSON object
    const json = XLSX.utils.sheet_to_json(worksheet);
    excelData = json;

    const columnNames = Object.keys(json[0]);
    //assert that the file contains the needed columns numbers
    if(columnNames.length < 3 || columnNames.length > 3)
    {
        alert('Please upload a file with only 3 columns');
        return;
    }

    // Detect if the file contains the needed columns and set the mapping to them
    if(columnNames.indexOf('name') != -1)
        productNameInput.value = columnNames.indexOf('name');
    if(columnNames.indexOf('type') != -1)
        productTypeInput.value = columnNames.indexOf('type');
    if(columnNames.indexOf('qty') != -1)
        productQtyInput.value = columnNames.indexOf('qty');


    //populate the select options with the column names
    let first = document.querySelectorAll('#productName>option')
    let second = document.querySelectorAll('#productType>option')
    let third = document.querySelectorAll('#productQuantity>option')
    for (let i = 0; i < columnNames.length; i++) {
        first[i].innerHTML = columnNames[i];
        second[i].innerHTML = columnNames[i];
        third[i].innerHTML = columnNames[i];
    }

    //displaying the mapping and the upload button
    mappingTable.style.display = 'block';
  };

  // Read the Excel file as binary data
  reader.readAsBinaryString(file);
}

function uploadData(event){

    fetch(`/products/store/`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({data:excelData,mapping:mapping}),
    })
    .then(response => {
        location.reload();
    })
}
