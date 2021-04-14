

<!DOCTYPE html>
<html>
    <head>
        <script src="algorithm.js"></script>
    </head>
    <body>
        <h2>PHP Test</h2>

        <table>
            <tr>
                <th>Serial No</th>
                <th>Title</th>
                <th>Body</th>
                <th></th>
            </tr>
            
            <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "toyin_test_db";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM posts";
                $result = $conn->query($sql);
                $conn->close();
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["id"]. "</td><td>" . $row["title"] . "</td><td>"
                    . $row["body"]. "</td><td></td></tr>";
                    }
                } 
                else { echo "0 results"; }
                $conn->close();
            ?>
        </table>

        <script>
            function get4rmJsonData(){
                fetch('https://jsonplaceholder.typicode.com/posts')
                .then((data) => data.json())
                .then((data) => {
                    let data10 = [];
                    for(let i = 0; i < 10; i++){
                        data10.push(data[i]);
                    }
                    //console.log(data10);
                    return data10;
                })
                .then((data) => {
                    data.map((eachData) => {
                        //console.log(eachData);
                        fetch('postData.php', {
                            method: 'POST',
                            headers: {
                                'Accept': 'application/json',
                                'Content-Type': 'application/json'
                                },
                            body: JSON.stringify({'id': eachData.id, 'title': eachData.title, 'body': eachData.body})
                        })
                        .then((data) => console.log(data))
                    })
                })
            }

            //get4rmJsonData();
        </script>
    </body>
</html>