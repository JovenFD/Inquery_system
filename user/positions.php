<section class='home-section mx-3 bg-light rounded shadow p-4'>
    <div class="card" style="width: 80%; margin: auto; box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
        <div class='card-body p-4'>
            <?php headerPosition(); ?>
            <div id="card" class="card mt-5">
                <div id="card-header" class="card-header">
                    <h4>Open Positions</h4>
                </div>
                <div id="card-body" class="card-body">
                    <?php getSelectIndexPosition(); ?>
                </div>
            </div>
        </div>
    </div>
</section>


<style>
    div#card,
    div#card-header {
        background-color: #061574;
    }

    div#card {
        width: 40% !important;
        margin: 100px auto !important;
    }

    div#card,
    div#card-header {
        border-top-left-radius: 35px;
        border-top-right-radius: 35px;
        border-bottom-left-radius: 35px;
        border-bottom-right-radius: 35px;
        border: unset !important;
    }

    div#card-body {
        border-top-left-radius: 35px;
        border-top-right-radius: 35px;
        border-bottom-left-radius: 23px;
        border-bottom-right-radius: 23px;
        background: #0d2093;
        height: 261px;
    }

    div#card-header h4 {
        text-align: center;
        font-size: 24px !important;
        color: #fff !important;
        font-weight: 700;
        margin: 10px;
    }

    div#card-body a {
        color: #fff !important;
        font-size: 21px;
        font-weight: 500;
        font-family: serif;
    }

    div#card-body ul {
        color: #fff !important;
        font-size: 21px;
    }
</style>