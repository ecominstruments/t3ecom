ALTER TABLE pages CHANGE tx_szpagesettings_teaserTxt tx_teaser_text text;
ALTER TABLE pages CHANGE tx_szpagesettings_teaserHeadline tx_teaser_headline varchar(255) DEFAULT '' NOT NULL;
ALTER TABLE pages CHANGE tx_szpagesettings_teaserImgFal tx_teaser_image varchar(255) DEFAULT '' NOT NULL;
ALTER TABLE pages CHANGE tx_szpagesettings_teaserLink tx_teaser_link varchar(255) DEFAULT '' NOT NULL;
ALTER TABLE pages CHANGE tx_szpagesettings_teaserLinktxt tx_teaser_link_label varchar(255) DEFAULT '' NOT NULL;
ALTER TABLE pages CHANGE tx_szpagesettings_footerDesc tx_footer_description text;
ALTER TABLE pages CHANGE tx_szpagesettings_hideFooterDesc tx_hide_footer_description tinyint(1) DEFAULT '0' NOT NULL;
ALTER TABLE pages CHANGE tx_szpagesettings_productImgFal tx_product_image varchar(255) DEFAULT '' NOT NULL;
ALTER TABLE pages CHANGE tx_szpagesettings_productCancelled tx_product_discontinued int(1) DEFAULT '0' NOT NULL;
ALTER TABLE pages CHANGE tx_szpagesettings_productZone tx_product_zone varchar(255) DEFAULT '' NOT NULL;
ALTER TABLE pages CHANGE tx_szpagesettings_productDivision tx_product_division varchar(255) DEFAULT '' NOT NULL;
ALTER TABLE pages CHANGE subnav_title tx_subnavigation_title varchar(255) DEFAULT '' NOT NULL;
ALTER TABLE pages DROP COLUMN tx_szpagesettings_pageIcon;
ALTER TABLE pages DROP COLUMN tx_szpagesettings_teaserImg;
ALTER TABLE pages DROP COLUMN tx_szpagesettings_productImg;

ALTER TABLE pages_language_overlay CHANGE tx_szpagesettings_teaserTxt tx_teaser_text text;
ALTER TABLE pages_language_overlay CHANGE tx_szpagesettings_teaserHeadline tx_teaser_headline varchar(255) DEFAULT '' NOT NULL;
ALTER TABLE pages_language_overlay CHANGE tx_szpagesettings_teaserImgFal tx_teaser_image varchar(255) DEFAULT '' NOT NULL;
ALTER TABLE pages_language_overlay CHANGE tx_szpagesettings_teaserLink tx_teaser_link varchar(255) DEFAULT '' NOT NULL;
ALTER TABLE pages_language_overlay CHANGE tx_szpagesettings_teaserLinktxt tx_teaser_link_label varchar(255) DEFAULT '' NOT NULL;
ALTER TABLE pages_language_overlay CHANGE tx_szpagesettings_footerDesc tx_footer_description text;
ALTER TABLE pages_language_overlay CHANGE tx_szpagesettings_hideFooterDesc tx_hide_footer_description tinyint(1) DEFAULT '0' NOT NULL;
ALTER TABLE pages_language_overlay CHANGE tx_szpagesettings_productImgFal tx_product_image varchar(255) DEFAULT '' NOT NULL;
ALTER TABLE pages_language_overlay CHANGE tx_szpagesettings_productCancelled tx_product_discontinued int(1) DEFAULT '0' NOT NULL;
ALTER TABLE pages_language_overlay CHANGE tx_szpagesettings_productZone tx_product_zone varchar(255) DEFAULT '' NOT NULL;
ALTER TABLE pages_language_overlay CHANGE tx_szpagesettings_productDivision tx_product_division varchar(255) DEFAULT '' NOT NULL;
ALTER TABLE pages_language_overlay CHANGE subnav_title tx_subnavigation_title varchar(255) DEFAULT '' NOT NULL;
ALTER TABLE pages_language_overlay DROP COLUMN tx_szpagesettings_pageIcon;
ALTER TABLE pages_language_overlay DROP COLUMN tx_szpagesettings_teaserImg;
ALTER TABLE pages_language_overlay DROP COLUMN tx_szpagesettings_productImg;

ALTER TABLE tt_content CHANGE tx_szpagesettings_moreLink tx_add_link varchar(255) DEFAULT '' NOT NULL;
ALTER TABLE tt_content CHANGE tx_szpagesettings_moreText tx_add_link_label varchar(255) DEFAULT '' NOT NULL;
ALTER TABLE tt_content DROP COLUMN tx_szpagesettings_forceDownload;

ALTER TABLE tx_news_domain_model_news CHANGE news_comments tx_news_comments int(11) DEFAULT '0' NOT NULL;

UPDATE sys_file_reference SET fieldname='tx_teaser_image' WHERE fieldname='tx_szpagesettings_teaserImgFal';
UPDATE sys_file_reference SET fieldname='tx_product_image' WHERE fieldname='tx_szpagesettings_productImgFal';