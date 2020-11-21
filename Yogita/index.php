<!DOCTYPE html>
<html>
    <head>
        <title>Student's Attendance Sheet</title>
        <meta charset="windows-1252">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style.css">    
    </head>
    <body>
        <?php include('header.php') ?>
        <div class="container-fluid bg-light text-primary">
            <?php include('main.php') ?>
        </div>

        <!-- INCLUDING JS FILE -->
        <script type="text/javascript">
               
            var rIndex,
                table = document.getElementById("table");
            
            // check the empty input
            function checkEmptyInput()
            {
                var isEmpty = false,
                    fname = document.getElementById("fname").value,
                    lname = document.getElementById("lname").value,
                    age = document.getElementById("age").value;
                    Roll = document.getElementById("roll").value;
                    Branch = document.getElementById("branch").value;
                    Company = document.getElementById("cname").value;
            
                if(fname === ""){
                    alert("Sr. No Connot Be Empty");
                    isEmpty = true;
                }
                else if(lname === ""){
                    alert(" Date Connot Be Empty");
                    isEmpty = true;
                }
                else if(age === ""){
                    alert("Student's Name Connot Be Empty");
                    isEmpty = true;
                }
                else if(Roll === ""){
                    alert("Roll No  Connot Be Empty");
                    isEmpty = true;
                }
                else if(Branch === ""){
                    alert("Branch Connot Be Empty");
                    isEmpty = true;
                }
                else if(Company === ""){
                    alert("Company Name Connot Be Empty");
                    isEmpty = true;
                }
                return isEmpty;
            }
            
            // add Row
            function addHtmlTableRow()
            {
                // get the table by id
                // create a new row and cells
                // get value from input text
                // set the values into row cell's
                if(!checkEmptyInput()){
                var newRow = table.insertRow(table.length),
                    cell1 = newRow.insertCell(0),
                    cell2 = newRow.insertCell(1),
                    cell3 = newRow.insertCell(2),
                    cell4 = newRow.insertCell(3),
                    cell5 = newRow.insertCell(4),
                    cell6 = newRow.insertCell(5),
                    fname = document.getElementById("fname").value,
                    lname = document.getElementById("lname").value,
                    age = document.getElementById("age").value;
                    Roll = document.getElementById("roll").value;
                    Branch = document.getElementById("branch").value;
                    Company = document.getElementById("cname").value;
            
                cell1.innerHTML = fname;
                cell2.innerHTML = lname;
                cell3.innerHTML = age;
                cell4.innerHTML = Roll;
                cell5.innerHTML = Branch;
                cell6.innerHTML = Company;
                // call the function to set the event to the new row
                selectedRowToInput();
            }
            }
            
            // display selected row data into input text
            function selectedRowToInput()
            {
                
                for(var i = 1; i < table.rows.length; i++)
                {
                    table.rows[i].onclick = function()
                    {
                      // get the seected row index
                      rIndex = this.rowIndex;
                      document.getElementById("fname").value = this.cells[0].innerHTML;
                      document.getElementById("lname").value = this.cells[1].innerHTML;
                      document.getElementById("age").value = this.cells[2].innerHTML;
                       document.getElementById("roll").value = this.cells[3].innerHTML;
                        document.getElementById("branch").value = this.cells[4].innerHTML;
                         document.getElementById("cname").value = this.cells[5].innerHTML;
                    };
                }
            }
            selectedRowToInput();
            
            function editHtmlTbleSelectedRow()
            {
                var fname = document.getElementById("fname").value,
                    lname = document.getElementById("lname").value,
                    age = document.getElementById("age").value;
                    Roll = document.getElementById("roll").value;
                    Branch = document.getElementById("branch").value;
                    Company = document.getElementById("cname").value;
               if(!checkEmptyInput()){
                table.rows[rIndex].cells[0].innerHTML = fname;
                table.rows[rIndex].cells[1].innerHTML = lname;
                table.rows[rIndex].cells[2].innerHTML = age;
                table.rows[rIndex].cells[3].innerHTML = Roll;
                table.rows[rIndex].cells[4].innerHTML = Branch;
                table.rows[rIndex].cells[5].innerHTML = Company;
              }
            }
            
            function removeSelectedRow()
            {
                table.deleteRow(rIndex);
                // clear input text
                document.getElementById("fname").value = "";
                document.getElementById("lname").value = "";
                document.getElementById("age").value = "";
                document.getElementById("roll").value = "";
                document.getElementById("branch").value = "";
                document.getElementById("cname").value = "";
            }
        
        </script>
        <!--INCLUDING FOOTER -->
        <?php include('footer.php') ?>
  <!-- Bootstrap Script-->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>