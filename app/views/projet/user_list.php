<?php $this->view("projet/header",$data);?>


      <!-- MAIN -->
      <main role="main">
        <!-- Content -->
        <article>
          <header class="section-top-padding background-white">
            <div class="line text-center">        
              <h1 class="text-dark text-s-size-30 text-m-size-40 text-l-size-headline text-thin text-line-height-1">Table User</h1>
            </div>  
          </header>
          <section class="section-top-padding background-white"> 

<?php 

echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Id</th><th>username</th><th>password</th><th>email</th><th>date</th></tr>";

class TableRows extends RecursiveIteratorIterator {
  function __construct($it) {
    parent::__construct($it, self::LEAVES_ONLY);
  }

  function current() {
    return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
  }

  function beginChildren() {
    echo "<tr>";
  }

  function endChildren() {
    echo "</tr>" . "\n";
  }
}

try {
  foreach(new TableRows(new RecursiveArrayIterator($data)) as $k=>$v) {
    echo $v;
  }
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
echo "</table>";
  ?>

</section>
</article>
</main>
<br>

<?php $this->view("projet/footer",$data);?>
