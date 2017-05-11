
ALTER TABLE `tbl_bac_panels_shipments` 
DROP INDEX `uk_ship_panel_lab` ,
ADD UNIQUE INDEX `uk_ship_panel_lab` (`panelId` ASC, `shipmentId` ASC, `deliveryStatus` ASC, `participantId` ASC);
