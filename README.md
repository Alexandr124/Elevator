# Elevator
There are two classes (Person and Elevator) and main file, let's call it controller. 

"Elevator" 
 For now, only one object of the elevator is in use, let in be the main one. However, we can move forward and create one more elevator, for example for disabled people, inheriting class we have for now. 
The class has several various features, open/close the doors functions, validating weight and it's the main function - elevate people. 

The second class - "Person", has basic parameters for typical elevator passenger and only one method - to press the button. 

In current example passengers were hardcoded, it is possible to add/delete them only via changing code. Their parameters could be changed in the same way. 

If to speak about possible improvements - there could be added some more elevators, created queue of passengers (to make this algorithm more convenient) and some more basic features for safety. Like checking if it is possible to close the door without harm for passengers, etc.
