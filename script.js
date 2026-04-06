alert("JS is loaded"); // test

function savePerson() {

    alert("Button Clicked"); // test

    let name = document.getElementById("name").value;
    let college_id = document.getElementById("college_id").value;
    let vehicle_type = document.getElementById("vehicle_type").value;
    let vehicle_number = document.getElementById("vehicle_number").value;
    let faculty = document.getElementById("faculty").value;

    fetch("savePerson.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: "name=" + name +
              "&college_id=" + college_id +
              "&vehicle_type=" + vehicle_type +
              "&vehicle_number=" + vehicle_number +
              "&faculty=" + faculty
    })
    .then(response => response.text())
    .then(data => {
        alert(data);
    })
    .catch(error => {
        alert("Error: " + error);
    });
}