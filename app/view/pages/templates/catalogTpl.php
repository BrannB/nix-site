<script src="/js/app.js" defer></script>
<div id="app">
    <products></products>
</div>


<!--<script defer>-->
<!--    async function getData() {-->
<!--        let data = await fetch("http://192.168.10.10/catalog/api")-->
<!--        let json = await data.json()-->
<!--        return await json-->
<!--    }-->
<!--    async function mapProducts() {-->
<!--        let products = await getData()-->
<!--        let messageTpl = ''-->
<!--        products.forEach(i => {-->
<!--            messageTpl += `-->
<!--            //     <div class="card bg-dark" style="border-color: snow; ">-->
<!--            //         <img src= "${i.image}" alt="...">-->
<!--            //         <div class="card-body">-->
<!--            //             <h2 class="card-title text-center" style="color: snow; background-color: #0c5460">-->
<!--            //                 ${i.name}-->
<!--            //             </h2>-->
<!--            //             <h4><p class="card-text text-center">${i.description}</p></h4>-->
<!--            //             <h3><p class="card-text text-center"><small class="text-muted">-->
<!--            //-->
<!--            //                 </small></p></h3>-->
<!--            //             <div class="text text-right" >-->
<!--            //                 <h3><b>${i.price + '$'}</b></h3>-->
<!--            //             <form action="catalog/addProduct" method="post" style="width: 100%">-->
<!--            // `;-->
<!--            // if (i.status == 0) {-->
<!--            //     messageTpl += `-->
<!--            //             <p>Нет в наличии</p>-->
<!--            //             <button disabled class="btn btn-lg btn-outline-danger" name="addToBucketBtn" value="${i.id}">-->
<!--            //             `-->
<!--            // } else if (i.status = 1) {-->
<!--            //     messageTpl += `-->
<!--            //             <p>В наличии</p>-->
<!--            //             <button class="btn btn-lg btn-outline-info" name="addToBucketBtn" value="${i.id}">-->
<!--            //             `-->
<!--            // }-->
<!--            //-->
<!--            // messageTpl += `-->
<!--            //                         В корзину-->
<!--            //                     </button>-->
<!--            //-->
<!--            //                 </form>-->
<!--            //             </div>-->
<!--            //         </div>-->
<!--            //     </div>-->
<!--            //     <br>-->
<!--            //     `-->

<!--        // })-->
<!--        // document.getElementById('productsList').innerHTML = messageTpl-->
<!--    // }-->
<!--    //-->
<!--    // mapProducts()-->
<!--</script>-->
<!---->
<!--<div id="productsList"></div>-->

<!---->
<!--<script src="--><?php //echo "js/app.js"?><!--" type="application/javascript" defer></script>-->
<!--<div id="app">-->
<!--    <product>-->
<!---->
<!--    </product>-->
<!--</div>-->
<!---->
<?php
//    foreach ($products['products'] as $item):
//?>
<!--    <div class="card bg-dark" style="border-color: snow">-->
<!--        <img src= "--><?php //echo $item->image?><!--" alt="...">-->
<!--        <div class="card-body">-->
<!--            <h2 class="card-title text-center" style="color: snow; background-color: #0c5460">-->
<!--                --><?php //echo $item->name?>
<!--            </h2>-->
<!--            <h4><p class="card-text text-center">--><?php //echo $item->description?><!--</p></h4>-->
<!--            <h3><p class="card-text text-center"><small class="text-muted">-->
<!--            --><?php
//              if ($item->status == 1)
//                 {
//                    echo "В наличии.";
//                 } else {
//                    echo "Нет в наличии.";
//                 }
//            ?>
<!--                    </small></p></h3>-->
<!--            <div class="text text-right" >-->
<!--                <h3><b>--><?php //echo $item->price . "$"; ?><!--</b></h3>-->
<!--                <form action="catalog/addProduct" method="post" style="width: 100%">-->
<!--                    <button --><?php // if ($item->status == 0) echo "disabled"?><!-- class="btn btn-lg btn-outline-info" name="addToBucketBtn" value="--><?php //echo $item->id ?><!--">-->
<!--                        В корзину-->
<!--                    </button>-->
<!--                </form>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--    <br>-->
<?php //endforeach; ?>
<!--<div class="text-right" style="display: block;-->
<!--    margin-left: auto;-->
<!--    margin-right: auto">-->
<!---->
<!--    --><?php //echo($products['pagination']->getHtml()); ?>
<!---->
<!--</div>-->
<!---->
<!---->
<!---->
