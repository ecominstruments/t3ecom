#
# Table structure for table 'pages'
#
CREATE TABLE pages (
  tx_product_custom_badge varchar(255) DEFAULT '' NOT NULL,
	tx_teaser_text text,
	tx_teaser_headline varchar(255) DEFAULT '' NOT NULL,
	tx_teaser_image varchar(255) DEFAULT '' NOT NULL,
	tx_teaser_link varchar(255) DEFAULT '' NOT NULL,
	tx_teaser_link_label varchar(255) DEFAULT '' NOT NULL,
	tx_footer_description text,
	tx_hide_footer_description tinyint(4) unsigned DEFAULT '0' NOT NULL,
	tx_product int(11) unsigned DEFAULT '0' NOT NULL,
	tx_product_quickmenu text,
	tx_product_jumpmenu text,
	tx_product_image varchar(255) DEFAULT '' NOT NULL,
	tx_product_shipping int(1) DEFAULT '0' NOT NULL,
	tx_product_discontinued int(1) DEFAULT '0' NOT NULL,
	tx_product_zone varchar(255) DEFAULT '' NOT NULL,
	tx_product_division varchar(255) DEFAULT '' NOT NULL,
	tx_subnavigation_title varchar(255) DEFAULT '' NOT NULL
);

#
# Table structure for table 'pages_language_overlay'
#
CREATE TABLE pages_language_overlay (
  tx_product_custom_badge varchar(255) DEFAULT '' NOT NULL,
	tx_teaser_text text,
	tx_teaser_headline varchar(255) DEFAULT '' NOT NULL,
	tx_teaser_image varchar(255) DEFAULT '' NOT NULL,
	tx_teaser_link varchar(255) DEFAULT '' NOT NULL,
	tx_teaser_link_label varchar(255) DEFAULT '' NOT NULL,
	tx_page_icon varchar(255) DEFAULT '' NOT NULL,
	tx_footer_description text,
	tx_hide_footer_description tinyint(4) unsigned DEFAULT '0' NOT NULL,
	tx_product_image varchar(255) DEFAULT '' NOT NULL,
	tx_subnavigation_title varchar(255) DEFAULT '' NOT NULL
);

#
# Table structure for table 'tt_content'
#
CREATE TABLE tt_content (
	tx_add_link varchar(255) DEFAULT '' NOT NULL,
	tx_add_link_label varchar(255) DEFAULT '' NOT NULL,
	tx_add_link_product varchar(255) DEFAULT '' NOT NULL,
	spaceBefore smallint(5) unsigned NOT NULL DEFAULT '0',
  spaceAfter smallint(5) unsigned NOT NULL DEFAULT '0'
);