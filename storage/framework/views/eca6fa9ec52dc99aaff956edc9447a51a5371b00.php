<form id="searchForm" action="/" method="get">
    <div class="form-group">
        <label for="destinationName">Destination</label>
        <select name="destinationName" id="destinationName" class="form-control">
            <option disabled selected>Select city</option>
            <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option <?php echo e((app('request')->input('destinationName') == $city ? 'selected': '')); ?>><?php echo e($city); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>

    <div class="form-group">
        <label for="tripStartDate">Check-in</label>
        <input id="startDate" type="text" class="form-control" name="tripStartDate" placeholder="mm/dd/yyyy" autocomplete="off"
               value="<?php echo e(app('request')->input('tripStartDate')); ?>">
    </div>

    <div class="form-group">
        <label for="tripEndDate">Check-out</label>
        <input id="endDate" type="text" class="form-control" name="tripEndDate" placeholder="mm/dd/yyyy" autocomplete="off"
               value="<?php echo e(app('request')->input('tripEndDate')); ?>">
    </div>

    <div class="form-group">
        <label for="minStarRating">Minimum Rating</label>
        <select name="minStarRating" id="minStarRating" class="form-control">
            <option disabled selected>Select rating</option>
            <?php for($i = 1; $i <= 5; $i++): ?>
                <option <?php echo e((app('request')->input('minStarRating') == $i ? 'selected': '')); ?>><?php echo e($i); ?></option>
            <?php endfor; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="maxStarRating">Maximum Rating</label>
        <select name="maxStarRating" id="maxStarRating" class="form-control">
            <option disabled selected>Select rating</option>
            <?php for($i = 1; $i <= 5; $i++): ?>
                <option <?php echo e((app('request')->input('maxStarRating') == $i ? 'selected': '')); ?>><?php echo e($i); ?></option>
            <?php endfor; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="totalRate">Total Price</label>
        <input type="text" id="totalRate" readonly style="border:0; color:#2b2b2b;">
        <input type="hidden" id="minTotalRate" name="minTotalRate" value="<?php echo app('request')->input('minTotalRate') ?? 0; ?>">
        <input type="hidden" id="maxTotalRate" name="maxTotalRate" value="<?php echo app('request')->input('maxTotalRate') ?? 5000; ?>">
        <div id="slider-range"></div>
    </div>

    <input type="hidden" name="search" value="search">

    <button type="submit" class="btn btn-default">Search</button>
</form>


<div class="col-xs-12">
    <hr>
</div>