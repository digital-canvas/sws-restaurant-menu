<div class="sws-menu type-restaurant-menu post-<?php the_ID() ?>" itemscope itemtype="http://schema.org/Menu">
	<?php $sections = get_field( 'content' ); ?>
	<?php if ( $sections ): ?>
		<?php foreach ( $sections as $section ): ?>
			<?php if ( $section['acf_fc_layout'] == 'content_block' ): ?>
				<div class="sws-menu__content"><?php echo $section['content_editor'] ?></div>
			<?php endif; ?>
			<?php if ( $section['acf_fc_layout'] == 'menu_section' ): ?>
				<div class="sws-menu__section" itemprop="hasMenuSection" itemscope itemtype="http://schema.org/MenuSection">
					<?php if ( $section['section_header'] ): ?>
						<h3 class="sws-menu__section__header" itemprop="name"><?php esc_html_e( $section['section_header'] ) ?></h3>
					<?php endif; ?>
					<?php if ( $section['section_description'] ): ?>
						<div class="sws-menu__section__description" itemprop="description"><?php esc_html_e( $section['section_description'] ) ?></div>
					<?php endif; ?>

					<?php if ( $section['menu_items'] ): ?>
						<div class="sws-menu__section__items">
							<?php foreach ( $section['menu_items'] as $item ): ?>
								<?php
								$type = '';
								if ( $item['acf_fc_layout'] == 'menu_item_add-on' ) {
									$type = 'aws-menu__item--addon';
								} elseif ( $item['acf_fc_layout'] == 'menu_item_variation' ) {
									$type = 'aws-menu__item--variation';
								}
								?>
								<div class="sws-menu__item <?php esc_attr_e( $type ) ?>" itemprop="hasMenuItem" itemscope itemtype="http://schema.org/MenuItem">
									<div class="sws-menu__item__wrapper">
										<?php if ( $item['menu_item_photo'] ): ?>
											<div class="sws-menu__item__photo" itemprop="image" itemscope itemtype="http://schema.org/ImageObject">
												<img src="<?php echo esc_url( $item['menu_item_photo']['sizes']['thumbnail'] ) ?>" width="<?php esc_attr_e( $item['menu_item_photo']['sizes']['thumbnail-width'] ) ?>" height="<?php esc_attr_e( $item['menu_item_photo']['sizes']['thumbnail-height'] ) ?>" itemprop="thumbnail" alt="<?php esc_attr_e( $item['menu_item_photo']['alt'] ) ?>" title="<?php esc_attr_e( $item['menu_item_photo']['title'] ) ?>">
												<meta itemprop="url" content="<?php esc_attr_e( $item['menu_item_photo']['url'] ) ?>">
												<meta itemprop="height" content="<?php esc_attr_e( $item['menu_item_photo']['height'] ) ?>">
												<meta itemprop="width" content="<?php esc_attr_e( $item['menu_item_photo']['width'] ) ?>">
												<?php if ( $item['menu_item_photo']['caption'] ): ?>
													<meta itemprop="caption" content="<?php esc_attr_e( $item['menu_item_photo']['caption'] ) ?>">
												<?php endif; ?>
												<meta itemprop="uploadDate" content="<?php esc_attr_e( $item['menu_item_photo']['date'] ) ?>">
											</div>
										<?php endif; ?>
										<div class="sws-menu__item__content">
											<div class="sws-menu__item__details">
												<?php if ( $item['menu_item_name'] ): ?>
													<div class="sws-menu__item__name" itemprop="name"><?php esc_html_e( $item['menu_item_name'] ) ?></div>
												<?php endif; ?>
												<?php if ( $item['menu_item_description'] ): ?>
													<div class="sws-menu__item__description" itemprop="description"><?php esc_html_e( $item['menu_item_description'] ) ?></div>
												<?php endif; ?>

												<?php if ( $item['acf_fc_layout'] == 'menu_item_add-on' ): ?>
													<div class="sws-menu__item__addons" itemprop="menuAddOn" itemscope itemtype="http://schema.org/MenuSection">
														<?php if ( $item['menu_addons'] ): ?>
															<?php foreach ( $item['menu_addons'] as $addon ): ?>
																<div class="sws-menu__item__addon" itemprop="hasMenuItem" itemscope itemtype="http://schema.org/MenuItem">
																	<?php if ( $addon['addon_label'] ): ?>
																		<div class="sws-menu__item__addon__name" itemprop="name"><?php esc_html_e( $addon['addon_label'] ) ?></div>
																	<?php endif; ?>
																	<?php if ( $addon['addon_price'] ): ?>
																		<div class="sws-menu__item__addon__offer" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                                <span class="sws-menu__item__addon__offer__price" itemprop="price">$<?php echo number_format( $addon['addon_price'],
		                                                2,
		                                                '.', ',' ) ?></span>
																			<meta itemprop="priceCurrency" content="USD">
																		</div>
																	<?php endif; ?>
																</div>
															<?php endforeach; ?>
														<?php endif; ?>
													</div>
												<?php endif; ?>

											</div>
											<?php if ( $item['menu_item_price'] ): ?>
												<div class="sws-menu__item_offer" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                  <span class="sws-menu__item_offer__price" itemprop="price">$<?php echo number_format( $item['menu_item_price'],
		                                  2, '.',
		                                  ',' ) ?></span>
													<meta itemprop="priceCurrency" content="USD">
												</div>
											<?php endif; ?>
											<?php if ( $item['acf_fc_layout'] == 'menu_item_variation' ): ?>
												<div class="sws-menu__item__variations" itemprop="menuAddOn" itemscope itemtype="http://schema.org/MenuSection">
													<?php if ( $item['menu_variations'] ): ?>
														<?php foreach ( $item['menu_variations'] as $variation ): ?>
															<div class="sws-menu__item__variation" itemprop="hasMenuItem" itemscope itemtype="http://schema.org/MenuItem">
																<?php if ( $variation['variation_label'] ): ?>
																	<div class="sws-menu__item__variation__name" itemprop="name"><?php esc_html_e( $variation['variation_label'] ) ?></div>
																<?php endif; ?>
																<?php if ( $variation['variation_price'] ): ?>
																	<div class="sws-menu__item__variation__offer" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                                <span class="sws-menu__item__variation__offer__price" itemprop="price">$<?php echo number_format( $variation['variation_price'],
		                                                2,
		                                                '.', ',' ) ?></span>
																		<meta itemprop="priceCurrency" content="USD">
																	</div>
																<?php endif; ?>
															</div>
														<?php endforeach; ?>
													<?php endif; ?>
												</div>
											<?php endif; ?>
										</div>
									</div>

								</div>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		<?php endforeach; ?>

	<?php endif; ?>

</div>

