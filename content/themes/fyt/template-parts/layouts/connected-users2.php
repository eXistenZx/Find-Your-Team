<?php


mysql_connect('217.70.189.96', 'fyt', 'fyt');
mysql_select_db('fyt');
if(isset($_SESSION['pseudo']))
{
        $dnns = mysql_fetch_array(mysql_query('select count(pseudo) as nb from connectes where pseudo="'.$_SESSION['pseudo'].'"'));
        if($dnns['nb']>0)
        {
                mysql_query('update connectes set timestamp="'.time().'" where pseudo="'.$_SESSION['pseudo'].'"');
        }
        else
        {
                mysql_query('insert into connectes (pseudo, timestamp) values ("'.$_SESSION['pseudo'].'", "'.time().'")');
        }
}
$times_m_5mins = time()-(60*5);
mysql_query('delete from connectes where timestamp<"'.$times_m_5mins.'"');
$dnns2 = mysql_query('select pseudo from connectes');
$num = mysql_num_rows($dnns2);
echo 'Il y a actuellement <strong>'.$num.'</strong> membre(s) connect&eacute;(s)';
if($dnns['nb']>0)
{
        echo ':<br />';
        $i=0;
        while($dn2 = mysql_fetch_array($dnns2))
        {
                $i++;
                echo $dn2['pseudo'];
                if($i<$num)
                {
                        echo ',';
                }
        }
}
echo '.';
?>
