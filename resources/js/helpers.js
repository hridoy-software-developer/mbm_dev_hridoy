export default {
	uuidv4() {
		return ([1e7]+-1e3+-4e3+-8e3+-1e11).replace(/[018]/g, c =>
			(c ^ crypto.getRandomValues(new Uint8Array(1))[0] & 15 >> c / 4).toString(16)
			);
	},
	amountConvert(amount) {
		const options = {
			minimumFractionDigits: 2,
			maximumFractionDigits: 2,
		};
		return Number(amount).toLocaleString("en", options)+" $";
	},
	numberConvert(amount) {
		const options = {
			minimumFractionDigits: 0,
			maximumFractionDigits: 0,
		};
		return Number(amount).toLocaleString("en", options);
	},
	isNumber(evt) {
		evt = (evt) ? evt : window.event;
		var charCode = (evt.which) ? evt.which : evt.keyCode;
		if ((charCode > 31 && (charCode < 48 || charCode > 57)) && charCode !== 46) {
			evt.preventDefault();;
		} else {
			return true;
		}
	},
	isEmpty(value){
		return (value === undefined || value == null || value.length === 0);
	},
	_post(url,params){
		$('.wating_loader').css('display', 'block');
		this.$inertia.post(this.base_url+'/'+url, params);
	},
	_get(url){
		$('.wating_loader').css('display', 'block');
		this.$inertia.get(this.base_url+'/'+url);
	}
};