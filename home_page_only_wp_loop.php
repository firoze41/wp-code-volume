ওয়ার্ডপ্রেস এ অনেক সময় আমাদের কিছু কোড দিতে হয় যা শুধুমাত্র হোম পেজের জন্য। সেজন্য নিচের লুপটি ব্যবহার করতে পারেন 

<?php if( is_home() || is_front_page() ) : ?>

<!-- Homepage Only Code -->

<?php else : ?>

<!-- Other Page Code -->

<?php endif; ?>


উপরের কোডটি দিয়ে আপনি চাইলে হোমপেজের জন্য আলাদা কোড লিখতে পারবেন অথবা হোম পেজ ছাড়া অন্য পেজে কোড লিখতে পারবেন। 


অথবা 

<?php if( is_home() || is_front_page() ) : ?>

<!-- Homepage Only Code -->

<?php endif; ?>


এই কোডটি দিয়ে শুধুমাত্র হোম পেজের জন্য কোড লিখতে পারবেন।