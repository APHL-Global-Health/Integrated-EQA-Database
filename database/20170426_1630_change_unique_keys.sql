ALTER TABLE `tbl_bac_sample_to_panel` 
ADD UNIQUE INDEX `UNIQUE_SAMPLE_PANEL` (`sampleId` ASC, `panelId` ASC, `deliveryStatus` ASC);


ALTER TABLE `tbl_bac_panels_shipments` 
DROP INDEX `uk_ship_panel_lab` ,
ADD UNIQUE INDEX `uk_ship_panel_lab` (`panelId` ASC, `shipmentId` ASC, `deliveryStatus` ASC);
