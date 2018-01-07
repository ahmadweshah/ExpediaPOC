
<row>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <row>
            
            <div class="col-md-6 col-sm-6 col-xs-6">
                <a href="<?php echo e(urldecode($hotel['hotelUrls']['hotelInfositeUrl'])); ?>">
                    <h4><u><?php echo e(str_limit($hotel['hotelInfo']['hotelName'], 30, '...')); ?></u></h4>
                </a>
                <p><strong><?php echo e($hotel['destination']['longName']); ?></strong></p>
            </div>

            
            <div class="col-md-6 col-sm-6 col-xs-6">
                <row>
                    
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <h4 class="pull-right" style="color: #2e6da4">
                            <strong><?php echo e($hotel['hotelInfo']['hotelStarRating']); ?> /
                                5
                                rating</strong></h4>
                    </div>
                </row>

                <row>
                    
                    <div class="col-md-8 col-sm-6 col-xs-12">
                        <h4 class="" align="right">
                            <strong>$<?php echo e($hotel['hotelPricingInfo']['originalPricePerNight']); ?> <?php echo e($hotel['hotelPricingInfo']['currency']); ?></strong><br><i>per night</i></h4>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <h4 align="right">
                            <strong>$<?php echo e($hotel['hotelPricingInfo']['totalPriceValue']); ?> <?php echo e($hotel['hotelPricingInfo']['currency']); ?></strong><br><i>for <?php echo e($hotel['offerDateRange']['lengthOfStay']); ?> nights</i></h4>
                    </div>
                </row>
            </div>
        </row>

        <br>

        <row>
            
            <div class="col-md-2 col-sm-3 col-xs-12">
                <?php if(!empty($hotel['hotelInfo']['hotelImageUrl'])): ?>
                    <img height="120px" width="120px" src="<?php echo e($hotel['hotelInfo']['hotelImageUrl']); ?>"
                         class="img-thumbnail">
                <?php else: ?>
                    <div height="120px" width="120px"></div>
                <?php endif; ?>
            </div>

            <div class="col-md-10 col-sm-9 col-xs-12">
                
                <p><strong>Description: </strong><?php echo e($hotel['hotelInfo']['description']); ?></p>

                
                <?php if(isset($hotel['hotelPricingInfo']['percentSavings']) && $hotel['hotelPricingInfo']['percentSavings'] > 0): ?>
                    <p><strong>Discount: </strong><?php echo e($hotel['hotelPricingInfo']['percentSavings']); ?>%
                        discount</p>
                <?php endif; ?>

                
                <?php if(isset($hotel['hotelUrgencyInfo']['almostSoldStatus']) && $hotel['hotelUrgencyInfo']['almostSoldStatus'] === 'ALMOST_SOLD'): ?>
                    <div class="alert alert-warning pull-right">
                        <strong>Almost sold out!</strong>
                    </div>
                <?php endif; ?>
            </div>
        </row>

        <row>
            
            <div class="col-xs-12">
                <a href="<?php echo e(urldecode($hotel['hotelUrls']['hotelInfositeUrl'])); ?>" class="btn btn-default pull-right"
                   role="button">Book this hotel</a>
            </div>
        </row>

        
        <div class="col-xs-12">
            <hr>
        </div>
    </div>
</row>