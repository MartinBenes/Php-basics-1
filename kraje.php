<?php
require_once("connect.php");
include_once("header.php");
// Pošlu SQL dotaz
$sql = "SELECT kraj_kod, nazev FROM kraj";
$result = $conn->query($sql);
// Zpracuji výsledek
if ($result->num_rows > 0) {
    echo "<aside><ol>";
    while($row = $result->fetch_assoc()) {
        echo "<li><a onmouseover='zobrazOkresy({$row['kraj_kod']})'
                           href='okres.php?kraj={$row['kraj_kod']}'> {$row['nazev']} </a></li> \n";
    }
    echo "</ol></aside>";
} else {echo "žádný výsledek ...";}
?>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
<script>
    function zobrazOkresy(kod) {
        $.ajax({
            url: 'okres.php?krajAjax='+kod,
            success: function(data) {
                $('#okresy').html(data);
            }
        })
    }
    function zobrazObce(kod) {
        $.ajax({
            url: 'obce.php?okres='+kod,
            success: function(data) {
                $('#obce').html(data);
            }
        })
    }
</script>
<aside id="okresy"></aside>
    <aside id="obce"></aside>
<?php
require("footer.php");
