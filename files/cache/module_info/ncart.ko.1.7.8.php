<?php if(!defined("__XE__")) exit();
$info = new stdClass;
$info->default_index_act = 'dispNcartCartItems';
$info->setup_index_act='';
$info->simple_setup_index_act='';
$info->admin_index_act = 'dispNcartAdminModInstList';
$info->action = new stdClass;
$info->action->dispNcartAdminConfig = new stdClass;
$info->action->dispNcartAdminConfig->type='view';
$info->action->dispNcartAdminConfig->grant='guest';
$info->action->dispNcartAdminConfig->standalone='true';
$info->action->dispNcartAdminConfig->ruleset='';
$info->action->dispNcartAdminConfig->method='';
$info->action->dispNcartAdminModInstList = new stdClass;
$info->action->dispNcartAdminModInstList->type='view';
$info->action->dispNcartAdminModInstList->grant='guest';
$info->action->dispNcartAdminModInstList->standalone='true';
$info->action->dispNcartAdminModInstList->ruleset='';
$info->action->dispNcartAdminModInstList->method='';
$info->action->dispNcartAdminInsertModInst = new stdClass;
$info->action->dispNcartAdminInsertModInst->type='view';
$info->action->dispNcartAdminInsertModInst->grant='guest';
$info->action->dispNcartAdminInsertModInst->standalone='true';
$info->action->dispNcartAdminInsertModInst->ruleset='';
$info->action->dispNcartAdminInsertModInst->method='';
$info->action->dispNcartAdminAdditionSetup = new stdClass;
$info->action->dispNcartAdminAdditionSetup->type='view';
$info->action->dispNcartAdminAdditionSetup->grant='guest';
$info->action->dispNcartAdminAdditionSetup->standalone='true';
$info->action->dispNcartAdminAdditionSetup->ruleset='';
$info->action->dispNcartAdminAdditionSetup->method='';
$info->action->dispNcartAdminSkinInfo = new stdClass;
$info->action->dispNcartAdminSkinInfo->type='view';
$info->action->dispNcartAdminSkinInfo->grant='guest';
$info->action->dispNcartAdminSkinInfo->standalone='true';
$info->action->dispNcartAdminSkinInfo->ruleset='';
$info->action->dispNcartAdminSkinInfo->method='';
$info->action->dispNcartAdminMobileSkinInfo = new stdClass;
$info->action->dispNcartAdminMobileSkinInfo->type='view';
$info->action->dispNcartAdminMobileSkinInfo->grant='guest';
$info->action->dispNcartAdminMobileSkinInfo->standalone='true';
$info->action->dispNcartAdminMobileSkinInfo->ruleset='';
$info->action->dispNcartAdminMobileSkinInfo->method='';
$info->action->dispNcartAdminOrderForm = new stdClass;
$info->action->dispNcartAdminOrderForm->type='view';
$info->action->dispNcartAdminOrderForm->grant='guest';
$info->action->dispNcartAdminOrderForm->standalone='true';
$info->action->dispNcartAdminOrderForm->ruleset='';
$info->action->dispNcartAdminOrderForm->method='';
$info->action->dispNcartAdminOrderDetail = new stdClass;
$info->action->dispNcartAdminOrderDetail->type='view';
$info->action->dispNcartAdminOrderDetail->grant='guest';
$info->action->dispNcartAdminOrderDetail->standalone='true';
$info->action->dispNcartAdminOrderDetail->ruleset='';
$info->action->dispNcartAdminOrderDetail->method='';
$info->action->dispNcartAdminOrderManagement = new stdClass;
$info->action->dispNcartAdminOrderManagement->type='view';
$info->action->dispNcartAdminOrderManagement->grant='guest';
$info->action->dispNcartAdminOrderManagement->standalone='true';
$info->action->dispNcartAdminOrderManagement->ruleset='';
$info->action->dispNcartAdminOrderManagement->method='';
$info->action->procNcartAdminConfig = new stdClass;
$info->action->procNcartAdminConfig->type='controller';
$info->action->procNcartAdminConfig->grant='guest';
$info->action->procNcartAdminConfig->standalone='true';
$info->action->procNcartAdminConfig->ruleset='';
$info->action->procNcartAdminConfig->method='';
$info->action->procNcartAdminInsertModInst = new stdClass;
$info->action->procNcartAdminInsertModInst->type='controller';
$info->action->procNcartAdminInsertModInst->grant='guest';
$info->action->procNcartAdminInsertModInst->standalone='true';
$info->action->procNcartAdminInsertModInst->ruleset='';
$info->action->procNcartAdminInsertModInst->method='';
$info->action->procNcartAdminDeleteModInst = new stdClass;
$info->action->procNcartAdminDeleteModInst->type='controller';
$info->action->procNcartAdminDeleteModInst->grant='guest';
$info->action->procNcartAdminDeleteModInst->standalone='true';
$info->action->procNcartAdminDeleteModInst->ruleset='';
$info->action->procNcartAdminDeleteModInst->method='';
$info->action->procNcartAdminUpdateStatus = new stdClass;
$info->action->procNcartAdminUpdateStatus->type='controller';
$info->action->procNcartAdminUpdateStatus->grant='guest';
$info->action->procNcartAdminUpdateStatus->standalone='true';
$info->action->procNcartAdminUpdateStatus->ruleset='';
$info->action->procNcartAdminUpdateStatus->method='';
$info->action->procNcartAdminDeleteOrders = new stdClass;
$info->action->procNcartAdminDeleteOrders->type='controller';
$info->action->procNcartAdminDeleteOrders->grant='guest';
$info->action->procNcartAdminDeleteOrders->standalone='true';
$info->action->procNcartAdminDeleteOrders->ruleset='';
$info->action->procNcartAdminDeleteOrders->method='';
$info->action->procNcartAdminInsertFieldset = new stdClass;
$info->action->procNcartAdminInsertFieldset->type='controller';
$info->action->procNcartAdminInsertFieldset->grant='guest';
$info->action->procNcartAdminInsertFieldset->standalone='true';
$info->action->procNcartAdminInsertFieldset->ruleset='';
$info->action->procNcartAdminInsertFieldset->method='';
$info->action->procNcartAdminDeleteFieldset = new stdClass;
$info->action->procNcartAdminDeleteFieldset->type='controller';
$info->action->procNcartAdminDeleteFieldset->grant='guest';
$info->action->procNcartAdminDeleteFieldset->standalone='true';
$info->action->procNcartAdminDeleteFieldset->ruleset='';
$info->action->procNcartAdminDeleteFieldset->method='';
$info->action->procNcartAdminArrangeItem = new stdClass;
$info->action->procNcartAdminArrangeItem->type='controller';
$info->action->procNcartAdminArrangeItem->grant='guest';
$info->action->procNcartAdminArrangeItem->standalone='true';
$info->action->procNcartAdminArrangeItem->ruleset='';
$info->action->procNcartAdminArrangeItem->method='';
$info->action->procNcartAdminInsertField = new stdClass;
$info->action->procNcartAdminInsertField->type='controller';
$info->action->procNcartAdminInsertField->grant='guest';
$info->action->procNcartAdminInsertField->standalone='true';
$info->action->procNcartAdminInsertField->ruleset='';
$info->action->procNcartAdminInsertField->method='';
$info->action->procNcartAdminDeleteField = new stdClass;
$info->action->procNcartAdminDeleteField->type='controller';
$info->action->procNcartAdminDeleteField->grant='guest';
$info->action->procNcartAdminDeleteField->standalone='true';
$info->action->procNcartAdminDeleteField->ruleset='';
$info->action->procNcartAdminDeleteField->method='';
$info->action->procNcartAdminUpdateFieldListOrder = new stdClass;
$info->action->procNcartAdminUpdateFieldListOrder->type='controller';
$info->action->procNcartAdminUpdateFieldListOrder->grant='guest';
$info->action->procNcartAdminUpdateFieldListOrder->standalone='true';
$info->action->procNcartAdminUpdateFieldListOrder->ruleset='';
$info->action->procNcartAdminUpdateFieldListOrder->method='';
$info->action->getNcartAdminDeleteModInst = new stdClass;
$info->action->getNcartAdminDeleteModInst->type='model';
$info->action->getNcartAdminDeleteModInst->grant='guest';
$info->action->getNcartAdminDeleteModInst->standalone='true';
$info->action->getNcartAdminDeleteModInst->ruleset='';
$info->action->getNcartAdminDeleteModInst->method='';
$info->action->getNcartAdminDeleteOrders = new stdClass;
$info->action->getNcartAdminDeleteOrders->type='model';
$info->action->getNcartAdminDeleteOrders->grant='guest';
$info->action->getNcartAdminDeleteOrders->standalone='true';
$info->action->getNcartAdminDeleteOrders->ruleset='';
$info->action->getNcartAdminDeleteOrders->method='';
$info->action->getNcartAdminFieldInfo = new stdClass;
$info->action->getNcartAdminFieldInfo->type='model';
$info->action->getNcartAdminFieldInfo->grant='guest';
$info->action->getNcartAdminFieldInfo->standalone='true';
$info->action->getNcartAdminFieldInfo->ruleset='';
$info->action->getNcartAdminFieldInfo->method='';
$info->action->getNcartAdminOrderDetails = new stdClass;
$info->action->getNcartAdminOrderDetails->type='model';
$info->action->getNcartAdminOrderDetails->grant='guest';
$info->action->getNcartAdminOrderDetails->standalone='true';
$info->action->getNcartAdminOrderDetails->ruleset='';
$info->action->getNcartAdminOrderDetails->method='';
$info->action->dispNcartCartItems = new stdClass;
$info->action->dispNcartCartItems->type='view';
$info->action->dispNcartCartItems->grant='guest';
$info->action->dispNcartCartItems->standalone='true';
$info->action->dispNcartCartItems->ruleset='';
$info->action->dispNcartCartItems->method='';
$info->action->dispNcartFavoriteItems = new stdClass;
$info->action->dispNcartFavoriteItems->type='view';
$info->action->dispNcartFavoriteItems->grant='guest';
$info->action->dispNcartFavoriteItems->standalone='true';
$info->action->dispNcartFavoriteItems->ruleset='';
$info->action->dispNcartFavoriteItems->method='';
$info->action->dispNcartOrderDetail = new stdClass;
$info->action->dispNcartOrderDetail->type='view';
$info->action->dispNcartOrderDetail->grant='guest';
$info->action->dispNcartOrderDetail->standalone='true';
$info->action->dispNcartOrderDetail->ruleset='';
$info->action->dispNcartOrderDetail->method='';
$info->action->dispNcartOrderItems = new stdClass;
$info->action->dispNcartOrderItems->type='view';
$info->action->dispNcartOrderItems->grant='guest';
$info->action->dispNcartOrderItems->standalone='true';
$info->action->dispNcartOrderItems->ruleset='';
$info->action->dispNcartOrderItems->method='';
$info->action->dispNcartOrderComplete = new stdClass;
$info->action->dispNcartOrderComplete->type='view';
$info->action->dispNcartOrderComplete->grant='guest';
$info->action->dispNcartOrderComplete->standalone='true';
$info->action->dispNcartOrderComplete->ruleset='';
$info->action->dispNcartOrderComplete->method='';
$info->action->dispNcartOrderList = new stdClass;
$info->action->dispNcartOrderList->type='view';
$info->action->dispNcartOrderList->grant='guest';
$info->action->dispNcartOrderList->standalone='true';
$info->action->dispNcartOrderList->ruleset='';
$info->action->dispNcartOrderList->method='';
$info->action->dispNcartReplyComment = new stdClass;
$info->action->dispNcartReplyComment->type='view';
$info->action->dispNcartReplyComment->grant='guest';
$info->action->dispNcartReplyComment->standalone='true';
$info->action->dispNcartReplyComment->ruleset='';
$info->action->dispNcartReplyComment->method='';
$info->action->dispNcartAddressList = new stdClass;
$info->action->dispNcartAddressList->type='view';
$info->action->dispNcartAddressList->grant='guest';
$info->action->dispNcartAddressList->standalone='true';
$info->action->dispNcartAddressList->ruleset='';
$info->action->dispNcartAddressList->method='';
$info->action->dispNcartAddressManagement = new stdClass;
$info->action->dispNcartAddressManagement->type='view';
$info->action->dispNcartAddressManagement->grant='guest';
$info->action->dispNcartAddressManagement->standalone='true';
$info->action->dispNcartAddressManagement->ruleset='';
$info->action->dispNcartAddressManagement->method='';
$info->action->dispNcartRecentAddress = new stdClass;
$info->action->dispNcartRecentAddress->type='view';
$info->action->dispNcartRecentAddress->grant='guest';
$info->action->dispNcartRecentAddress->standalone='true';
$info->action->dispNcartRecentAddress->ruleset='';
$info->action->dispNcartRecentAddress->method='';
$info->action->dispNcartLogin = new stdClass;
$info->action->dispNcartLogin->type='view';
$info->action->dispNcartLogin->grant='guest';
$info->action->dispNcartLogin->standalone='true';
$info->action->dispNcartLogin->ruleset='';
$info->action->dispNcartLogin->method='';
$info->action->procNcartDeleteCart = new stdClass;
$info->action->procNcartDeleteCart->type='controller';
$info->action->procNcartDeleteCart->grant='guest';
$info->action->procNcartDeleteCart->standalone='true';
$info->action->procNcartDeleteCart->ruleset='';
$info->action->procNcartDeleteCart->method='';
$info->action->procNcartDeleteFavoriteItems = new stdClass;
$info->action->procNcartDeleteFavoriteItems->type='controller';
$info->action->procNcartDeleteFavoriteItems->grant='guest';
$info->action->procNcartDeleteFavoriteItems->standalone='true';
$info->action->procNcartDeleteFavoriteItems->ruleset='';
$info->action->procNcartDeleteFavoriteItems->method='';
$info->action->procNcartInsertAddress = new stdClass;
$info->action->procNcartInsertAddress->type='controller';
$info->action->procNcartInsertAddress->grant='guest';
$info->action->procNcartInsertAddress->standalone='true';
$info->action->procNcartInsertAddress->ruleset='';
$info->action->procNcartInsertAddress->method='';
$info->action->procNcartUpdateQuantity = new stdClass;
$info->action->procNcartUpdateQuantity->type='controller';
$info->action->procNcartUpdateQuantity->grant='guest';
$info->action->procNcartUpdateQuantity->standalone='true';
$info->action->procNcartUpdateQuantity->ruleset='';
$info->action->procNcartUpdateQuantity->method='';
$info->action->procNcartInsertOrder = new stdClass;
$info->action->procNcartInsertOrder->type='controller';
$info->action->procNcartInsertOrder->grant='guest';
$info->action->procNcartInsertOrder->standalone='true';
$info->action->procNcartInsertOrder->ruleset='';
$info->action->procNcartInsertOrder->method='';
$info->action->procNcartDeleteAddress = new stdClass;
$info->action->procNcartDeleteAddress->type='controller';
$info->action->procNcartDeleteAddress->grant='guest';
$info->action->procNcartDeleteAddress->standalone='true';
$info->action->procNcartDeleteAddress->ruleset='';
$info->action->procNcartDeleteAddress->method='';
$info->action->procNcartMileagePayment = new stdClass;
$info->action->procNcartMileagePayment->type='controller';
$info->action->procNcartMileagePayment->grant='guest';
$info->action->procNcartMileagePayment->standalone='true';
$info->action->procNcartMileagePayment->ruleset='';
$info->action->procNcartMileagePayment->method='';
$info->action->getNcartCartItems = new stdClass;
$info->action->getNcartCartItems->type='model';
$info->action->getNcartCartItems->grant='guest';
$info->action->getNcartCartItems->standalone='true';
$info->action->getNcartCartItems->ruleset='';
$info->action->getNcartCartItems->method='';
$info->action->getNcartFavoriteItems = new stdClass;
$info->action->getNcartFavoriteItems->type='model';
$info->action->getNcartFavoriteItems->grant='guest';
$info->action->getNcartFavoriteItems->standalone='true';
$info->action->getNcartFavoriteItems->ruleset='';
$info->action->getNcartFavoriteItems->method='';
$info->action->getNcartDisplayItems = new stdClass;
$info->action->getNcartDisplayItems->type='model';
$info->action->getNcartDisplayItems->grant='guest';
$info->action->getNcartDisplayItems->standalone='true';
$info->action->getNcartDisplayItems->ruleset='';
$info->action->getNcartDisplayItems->method='';
$info->action->getNcartAddressInfo = new stdClass;
$info->action->getNcartAddressInfo->type='model';
$info->action->getNcartAddressInfo->grant='guest';
$info->action->getNcartAddressInfo->standalone='true';
$info->action->getNcartAddressInfo->ruleset='';
$info->action->getNcartAddressInfo->method='';
return $info;