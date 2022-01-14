<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bug submission reports</title>
</head>
<body>
    <!-- create form to accept following -->
    <!-- fields = product name, version, type of hardware, OS, frequency of occurrence, proposed solutions -->
    <!-- add links for creation and viewing a report -->
    <!-- allow to update the report -->
    <button>Report a bug</button>
    <button>Modify Bug report</button>

    <form action="bugs.php" method="post">
    <p>Product Name: <br><input type="text" name="productName"></p>
    <p>Version: <br><input type="text" name="productVersion" ></p>
    <p>Type of Hardware: <br> <input type="text" name="typrOfHardware"></p>
    <p>Operating System: <br><select name="OS">
        <option value="Mac">Mac</option>
        <option value="Windows"> Windows</option>
        <option value="Linux">Linux</option>
    </select></p>
    <p>Frequency of occurrence: <br><input type="text" name="frequency"></p>
    <p>Proposed Solutions: <br><textarea name="proposedSolution" id="" cols="30" rows="10"></textarea></p>
    <p><input type="submit" value="Create Ticket" name="submit"></p>
    </form>


    
</body>
</html>