<?php if(count($hotels) > 0): ?>
	<?php { $x = 0; ?>
	<div class="hotels">
		<?php foreach($hotels as $hotel): ?>
			<?php { $x += 1; ?>
			<input type="checkbox" class="hotel" id= "<?php echo $x; ?>" value="<?php echo $hotelsID[$x-1]; ?>" onclick="<?php echo 'hotelBoxFct(' . $x . ')'; ?>" name="<?php echo 'hotel' . $x; ?>"> <?php echo $hotel; ?><br>
			<?php } ?>
		<?php endforeach ?>
	</div>
	<?php } ?>
<?php endif ?>

<br><br>

<?php if(count($trips) > 0): ?>
	<?php { $y = count($hotels); ?>
	<div class="trips">
		<?php foreach($trips as $trip): ?>
			<?php { $y += 1; ?>
			<input type="checkbox" class="trip" id= "<?php echo $y; ?>" value="<?php echo $tripsID[$y-1-count($hotels)]; ?>" onclick="<?php echo 'tripBoxFct(' . $y . ')'; ?>" name="<?php echo 'trip' . $y; ?>"> <?php echo $trip; ?><br>
			<?php } ?>
		<?php endforeach ?>
	</div>
	<?php } ?>
<?php endif ?>