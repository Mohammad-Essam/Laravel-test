const fileInput = document.getElementById('fileInput');

let mapping = [0,1,2];
let jsonData = JSON.stringify({data:null,mapping:mapping})
fileInput.addEventListener('change', handleFile);


const mapInput = document.getElementById('map');
mapInput.addEventListener('input', handleMap);
function handleMap(event)
{
    mapping = event.target.value.split('');
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


    // can be used to sends the names of the column, you can infer the mapping from it if it contains the needed name
    // so i could map it and make its order
    const columnNames = Object.keys(json[0]);

    jsonData = JSON.stringify({data:json,mapping:mapping});
  };

  // Read the Excel file as binary data
  reader.readAsBinaryString(file);
}

const uploadData = async () => {

    fetch(`/products/store/`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Content-Type': 'application/json',
        },
        body: jsonData,
    })

    //refresh so the user can see the new products
    // setTimeout(function() {
    //     location.reload();
    //   }, 3000);
}
