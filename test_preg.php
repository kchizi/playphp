<?php
    $par='/(<a[^>]+>).*(<\/a>)/i';
    $str='<a href="buy.php?ms_sid=4&amp;phoneId=5579&amp;game=13164722&amp;r=product.php%253Fgame%253D13164722%2526cat%253Dourhits%2526r%253Dindex.php&amp;sv12535=5124c2f254f347456648&amp;lan=en&amp;test=qa">Buy Tk20.00</a>';
    echo preg_replace($par,'$1abc$2',$str);
    print_r($match);
?>