 
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<?php
$sqlmess = "SELECT wi.sid1, wi.sid2, wi.nbligne, wp.id_u, wp.u_prenom, wp.u_nom 
            FROM chat_ind wi 
            INNER JOIN a_utilisateur wp ON wp.id_u = wi.sid1 
            WHERE wi.sid2 = '" . mysqli_real_escape_string($linki, $_SESSION['SID']) . "' 
            AND wi.nbligne = 1 
            ORDER BY id_ind ASC";

$reqmess = mysqli_query($linki, $sqlmess);

if ($reqmess && mysqli_num_rows($reqmess) > 0) {
?>
    <nav id="bottom-nav" class="navbar navbar-default navbar-fixed-bottom" role="navigation">
        <div class="container-fluid">
            <div class="row">
                <ul id="newsticker" class="newsticker">
                    <?php 
                    while ($datamess = mysqli_fetch_array($reqmess, MYSQLI_ASSOC)) {
                        $name = htmlspecialchars($datamess['u_prenom'] . ' ' . $datamess['u_nom']);
                    ?>
                        <li class="news-item">
                            <a href="/chat/chat.php?sid1=<?php echo htmlspecialchars($sid1); ?>&sid2=<?php echo htmlspecialchars($datamess['sid1']); ?>&sid3=<?php echo htmlspecialchars($sid3); ?>">
                                You got a new message from <b><?php echo $name; ?></b>
                            </a>
                        </li>
                    <?php 
                    } 
                    ?>
                </ul>
            </div>
        </div>
    </nav>
<?php
}
mysqli_free_result($reqmess);
?>