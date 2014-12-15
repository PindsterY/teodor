<h3><? __('Õpetaja päevik') ?></h3>

<br>
<select id="period_id" name="period[period_id]" class="chosen-select">
    <? foreach ($periods as $period): ?>
        <option
            value="<?= $period['period_id'] ?>" <?= $period_id == $period['period_id'] ? 'selected="selected"' : '' ?>><?= $period['period_name'] ?></option>
    <? endforeach ?>
</select>
<script src="http://harvesthq.github.io/chosen/chosen.jquery.js"></script>
<script>
    $(function () {
        $(".chosen-select").chosen({width: "100%"});
        $('.chosen-select-deselect').chosen({allow_single_deselect: true});
        $(".chosen-select").change(function(){
            window.location="<?= BASE_URL ?>journal/teacher?period_id="+ this.value;
            console.log("<?= BASE_URL ?>journal/teacher?period_id="+ this.value);
        });
    });
</script>

<table class="table table-bordered">
    <tr>
        <td><b>Grupi nimi</b></td>
        <td><b>Kursuse nimetus</b></td>
        <td><b>Tunde</b></td>
        <td><b>Õppeaasta</b></td>
        <td><b>Perioodid</b></td>
        <td><b>Kursuse pikkus</b></td>
    </tr>
    <? foreach($period_courses as $period_course): ?>
    <tr class="header">
        <td><b><?= $period_course['group_name']?></b></td>
        <td><?= $period_course['subject_name']?></td>
        <td><?= $period_course['planned_lessons']?></td>
        <td><?= $period_course['year_name']?></td>
        <td><?= $period_course['period_name']?></td>
        <td>80 tundi</td>
    </tr>

    <? endforeach ?>
</table>

<script>
    $('.header').click(function(){
        $(this).next('.subrow').toggle();
    });
</script>

