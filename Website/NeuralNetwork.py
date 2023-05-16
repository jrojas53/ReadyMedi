#Neural network class and attemp to train ai
# no test data set to train it on though

import numpy as np

class NeuralNetwork:
        # Neural network class with 2 hidden layers
        # fpropagation works with correctly formatted data 
        def __init__(self, inputL, hl1nodes, hl2nodes, outputL):
        	# input layer
        	self.inputL = inputL
            # hidden layers
        	self.hl1nodes = hl1nodes
        	self.hl2nodes = hl2nodes
        	self.outputL = outputL
        	# assigning random weights
        	self.w1 = np.random.rand(self.inputL, self.hl1nodes)
        	self.w2 = np.random.rand(self.hl1nodes, self.hl2nodes)
        	self.w3 = np.random.rand(self.hl2nodes, self.outputL)
        
        # activation function for hidden layers	 
        def leakyrelu(self, arr):
                return np.where(arr > 0, arr, arr * 0.1)
        
        # activation function for output layer       
        def softmax(self, x):
                exp = np.exp(x)
                return exp / np.sum(exp, axis=1, keepdims=True)
        
        # function to feed forward input data through network
        def fpropagation(self, x):
                hidlay1 = np.dot(x, self.w1)
                fwd1 = self.leakyrelu(hidlay1)
                
                hidlay2 = np.dot(fwd1, self.w2)
                fwd2 = self.leakyrelu(hidlay2)
                
                outlay = np.dot(fwd2, self.w3)
                res = self.softmax(outlay)
                return res

### From this point on in the code it needs to be debugged and worked on ####
def crossentropyLoss(true, pred):
        return -np.mean(true * np.log(pred + 1e-8))
      
# training funciton for training Neural Network
def trainAI(network, train, bTrain, learnRate = 0.0001, epochs = 10000):
	for epoch in range(epochs):
		pred = network.fpropagation(train)
		loss = crossentropyLoss(bTrain, pred)
        # computing loss
		print("Epoch:", epoch, " Loss: ", loss)
        
        # computing gradient 3 using backpropagation and dot product for matrix multiplication
		gradOutlay = pred - bTrain
		gradw3 = np.dot(network.leakyrelu(np.dot(network.leakyrelu(np.dot(train, network.w1)), network.w2)).T, gradOutlay) / train.shape[0]
		
        output = np.dot(network.leakyrelu(np.dot(train, network.w1)), network.w2)
        # performs checks using nan or inf to prevent error in gradients  
		output[np.isnan(output) | np.isinf(output)] = 0.0001
        
        gradfwd2 = np.dot(gradOutlay, network.w3.T) * np.where(output > 0, 1, 0.01)
        # computing gradient 2 using backproagation and dot product for matrix multiplication
		gradw2 = np.dot(network.leakyrelu(np.dot(train, network.w1)).T, gradfwd2) / train.shape[0]
        
		gradfwd1 = np.dot(gradfwd2 * np.where(np.dot(train, network.w1) > 0, 1, 0.01), network.w2.T)
        # computing gradient 1 using training data
		gradw1 = np.dot(train.T, gradfwd1) / train.shape[0]
        
        # Update weights        
		network.w1 -= learnRate * gradw1 
		network.w2 -= learnRate * gradw2
		network.w3 -= learnRate * gradw3
		if epoch % 100 == 0:
			print(f"Epoch{epoch}, Loss: {loss:.4f}")

 # takes two arguments and returns the predicted class label as single integer value    
def prediction(network, x):
	pred = network.fpropagation(x)
	return np.argmax(pred, axis = 1)

# example of patients and their answers to the questions
# it needs to be passed 
testmatrix = [[1, 1, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 1]]

# creates array predicts off of each testmatrix array
N = np.array(testmatrix)
network = NeuralNetwork(15, 1, 1, 15)
predictions = prediction(network, np.array(testmatrix))
for i, pred in enumerate(predictions):
		print("Patient {} likely illness:{}".format(i,pred))

print("")
#takes predicted illness and prints for each patient
for i in range(len(predictions)):
    illness_sympt = predictions[i]
    if illness_sympt == 0:
        print(f"Patient {i} has pinkeye.")
    elif illness_sympt == 2:
    	print(f"Patient {i} has flu.")
    else:
        print(f"Patient {i} has an unknown disease.")
		
train = testmatrix
bTrain = np.zeros((1, 15))
trainAI(network, train, bTrain, .01, 25)
# prediction being made on new dataset
newpred = np.random.randint(0, 2, size =(1, 15)) 
pred = prediction(network, newpred)
        
print("The new Predictions are:")

print(pred)
