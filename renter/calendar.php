<div>
    <div class="head bg-dark text-center text-light p-1 d-flex align-items-center justify-content-center">
        <div class="d-block">Rental Dates of <br><?php echo $bike['name']; ?></div>
    </div>
    <div class="week border p-1" style="display: flex;flex-wrap: wrap;">
        <div>Sun</div>
        <div>Mon</div>
        <div>Tue</div>
        <div>Wed</div>
        <div>Thur</div>
        <div>Fri</div>
        <div>Sat</div>
    </div>
    <div class="days border p-1" style="display: flex;flex-wrap: wrap;">
    </div>
    <div class="days border p-1" style="display: flex;flex-wrap: wrap;">
        <div class="col-3"><input type="button" value="prev" onclick="movedate('prev')"></div>
        <div class="col-6 d-flex justify-content-center align-items-center" id="pdate"></div>
        <div class="col-3 d-flex justify-content-end ml-3"><input type="button" value="next" onclick="movedate('next')"></div>

    </div>
</div>


<script>
    var dt = new Date();


    function renderdate() {
        document.getElementById('pdate').innerHTML = dt.toDateString();
        var enddate = new Date(
            dt.getFullYear(),
            dt.getMonth() + 1,
            0).getDate();


            
        var rent = JSON.parse('<?php echo json_encode($rents); ?>');

        var day = dt.getDay();
        var cells = "";
        var today = new Date();
        var prevDate = new Date(dt.getFullYear(), dt.getMonth(), 0).getDate();

        var cname = 'class="day"'
        var pname = 'class="pday"'
        var tname = 'class="tday"'
        var rname = 'class="rday"'

        console.log(rent[0])

        from_date = new Date(rent[0].from_date);
        to_date = new Date(rent[0].to_date);
        console.log(from_date.getDate());

        for (x = day; x > 0; x--) {
            cells += "<div " + pname + ">" + (prevDate - x + 1) + "</div>";
        }
        for (i = 1; i <= enddate; i++) {
            if (i >= from_date.getDate() && from_date.getMonth() == dt.getMonth()&&i<=to_date.getDate()) {
                cells += "<div " + tname + " >" + i + "</div>";
               
               
            } else {
                cells += "<div " + cname + " >" + i + "</div>";
            }
            dayblock=document.getElementsByClassName('day');
            if(3==dayblock.innerHTML){
                dayblock.style.backgroundColor='red'
            }

        }
        document.getElementsByClassName("days")[0].innerHTML = cells;
    }

    function movedate(para) {
        if (para == 'prev') {
            dt.setMonth(dt.getMonth() - 1);
            renderdate();
        } else if (para == 'next') {
            dt.setMonth(dt.getMonth() + 1);
            renderdate();
        }

    }
</script>