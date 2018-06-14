# schoolmanagement
schoolmanagement
URL:   http://blog.chapagain.com.np/node-js-express-mongodb-simple-add-edit-delete-view-crud/


This is only for my testing purpose. Once it will be completed I will design all the code .
How to add bootstrap.js file on Magento 2
https://magento.stackexchange.com/questions/107763/how-to-add-bootstrap-js-in-magento2

**************************
We do not support currencies other than INR at the moment. As a workaround, we support optional display of amount in USD. To use custom currency,
just pass these 2 additional options along with existing ones when creating Razorpay 
object: display_currency: 'USD', 
display_amount: '34.23' 
This will only change the display in the checkout form. 
The payment is still made in INR, 
but will show up in the local currency in the customer's credit card statement. 
All pricing calculations will be done on the amount parameter, 
which is in INR. 
**************************

**************************
As suggested above, you can display the currency in USD on Razorpay checkout, however, you would need to convert the amount from USD to INR and pass the same to Razorpay for processing
You would need to integrate Razorpay checkout on your website: https://docs.razorpay.com/docs/checkout-form#manual-checkout

And would need to pass 2 extra params as below, 
``` 
display_currency: 'USD', 
display_amount: 'amount_in_USD', 
amount: 'USD to INR converted amount' //In paisa 
``` 
**************************
