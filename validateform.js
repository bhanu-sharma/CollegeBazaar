function validateForm() 
{
    var x = document.forms["myform"]["itemimage"].value;
    if (x == null || x == "") {
        alert("Item Image must be filled out");
        return false;
    }
}