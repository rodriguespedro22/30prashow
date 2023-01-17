<?php
$this->layout("_theme",["categories" => $categories]);
?>
<link href="<?= url("assets/app/"); ?>css/show.css" rel="stylesheet">
<link href="<?= url("assets/web/"); ?>css/style.css" rel="stylesheet">

    <main class="flex-shrink-0">
            <!-- Header-->
            <header class="bg-colorido py-5">
                <div class="container px-5">
                    <div class="row gx-5 align-items-center justify-content-center">
                        <div class="col-lg-8 col-xl-7 col-xxl-6">
                            <div class="my-5 text-center text-xl-start">
                                <h1 class="display-5 fw-bolder text-white mb-2"><?= $show->name; ?></h1>
                                <p class="lead fw-normal text-white-50 mb-4"><?= $show->day; ?>
                                <br/>
                                <?= $show->local; ?>
                                </p>
                                <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                                    <a id="buy" type="submit"class="btn btn-primary btn-lg px-4 me-sm-3">Comprar ingresso</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="boxshadow img-fluid rounded-3 my-5" src="<?= url($show->image); ?>" alt="..." /></div>
                    </div>
                </div>
            </header>
        </main>
</div>
<script type="text/javascript" async>
        const buy = document.querySelector("#buy");
        // console.log(buy)
        
        buy.addEventListener("click", async () => {
            // e.preventDefault();
            // window.alert("Oi");
            const dataPost = new HTMLLinkElement(buy);
            // console.log(dataPost)
            const data = await fetch("<?= url("app/comprarshow/" . $show->id)?>",{
                method: "POST",
                body: dataPost,
            });
            // console.log(data)
        });
    </script>