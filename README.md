mcrypt_rand_gen
===============

Set out to make a cryptographically secure random number generator for PHP that could run on any PHP5.3+ deployment. Additional, and important, goals of this project are to make the generator quick and run using tools already available in PHP.

The main hurdle for this project was to overcome the Modulo Bias when generating numbers with mcrypt_create_iv. Doing so while also being effiecient was achieved by utilizing all 8 bits generated with each iv created, and only generating the number of bytes needed. Modulo was kept to powers of 2 only to mitigate bias. 
