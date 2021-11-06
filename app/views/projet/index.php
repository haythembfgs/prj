<?php $this->view("projet/header",$data);?>

<style>
table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: monospace;
font-size: 25px;
text-align: left;
}
th {
background-color: #588c7e;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>
</head>
<body>


      <!-- MAIN -->
      <main role="main">
       
        <!-- Content -->
        <article>
          <header class="section background-white">
            <div class="line text-center">        
              <h1 class="text-dark text-s-size-30 text-m-size-40 text-l-size-headline text-thin text-line-height-1">Be More with Less</h1>
              <table>
<tr>
<th>Id</th>
<th>Username</th>
<th>email</th>
<th>password</th>
<th>date</th>
</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "projet_db");

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT id, username, email, password, date FROM users";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["id"]. "</td><td>" . $row["username"] . "</td><td>"
. $row["email"] ."</td><td>" . $row["password"]. "</td><td>" . $row["date"]. "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
            </div>  
          </header>

          <?php if(is_array($data['posts'])): ?>
          
          <?php foreach($data['posts'] as $row): ?>

            <div class="background-white full-width"> 
              <div class="s-12 m-6 l-five">
                <a class="image-with-hover-overlay image-hover-zoom" href="<?=ROOT.'single_post/' .$row->url_address; ?>/" title="Portfolio Image">
                  <div class="image-hover-overlay background-primary"> 
                    <div class="image-hover-overlay-content text-center padding-2x">
                      <h3 class="text-white text-size-20 margin-bottom-10"><?=$row->title?></h3>
                      <p class="text-white text-size-14 margin-bottom-20"><?=$row->description?></p>  
                    </div> 
                  </div> 
                  <img class="full-img" src="<?=ROOT. $row->image?>" alt=""/>
                </a>	
              </div>

          <?php endforeach; ?>
          <?php endif; ?>

          </div>  
        </article>
        <br>
        <section>
          <a href="<?=$data['prev_page']?>"><input type="button" class="s-12 submit-form button background-primary text-white" style="width: 200px;"  value="Prev"></a>
          <a href="<?=$data['next_page']?>"><input type="button" class="s-12 submit-form button background-primary text-white" style="width: 200px; float: right;"  value="Next"></a>
        </section>
      </main>

<?php $this->view("projet/footer",$data);?>