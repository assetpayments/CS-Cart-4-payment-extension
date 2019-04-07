<p>{__("assetpayments.short_notice")}</p>
<hr>

<div class="control-group">
    <label class="control-label cm-required" for="assetpayments_merchant_id">{__("assetpayments.merchant_id")}:</label>
    <div class="controls">
	<input type="text" name="payment_data[processor_params][assetpayments_merchant_id]" id="assetpayments_merchant_id" value="{$processor_params.assetpayments_merchant_id}" size="60">
    </div>
</div>

<div class="control-group">
    <label class="control-label cm-required" for="assetpayments_secret_key">{__("assetpayments.secret_key")}:</label>
    <div class="controls">
	<input type="text" name="payment_data[processor_params][assetpayments_secret_key]" id="assetpayments_secret_key" value="{$processor_params.assetpayments_secret_key}" size="60">
    </div>
</div>

<div class="control-group">
    <label class="control-label cm-required" for="assetpayments_template_id">{__("assetpayments.template_id")}:</label>
    <div class="controls">
	<input type="text" name="payment_data[processor_params][assetpayments_template_id]" id="assetpayments_template_id" value="{$processor_params.assetpayments_template_id}" size="60">
    </div>
</div>


