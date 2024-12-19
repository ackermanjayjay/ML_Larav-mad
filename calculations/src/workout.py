# -*- coding: utf-8 -*-
"""workout.ipynb

Automatically generated by Colab.

Original file is located at
    https://colab.research.google.com/drive/1o4Msj6lN_oJ-APQyjrVmEo5sawluugtM
"""

import pandas as pd

"""# understanding data"""

data = pd.read_csv("/content/gym_members_exercise_tracking.csv")

data.head()

data.info()

data["Workout_Type"].value_counts()

data["Workout_Type"].unique()

data.head()

import matplotlib.pyplot as plt

import seaborn as sns

for value in data["Gender"].unique():
  plt.figure(figsize=(12,6))

  sns.lineplot(x='Session_Duration (hours)',y='Water_Intake (liters)',data=data[data["Gender"] == value])

  plt.title(f'Liters of Water Intake by Duration workout {value}')

  plt.show()

for value in data["Workout_Type"].unique():
  plt.figure(figsize=(12,6))

  sns.lineplot(x='Session_Duration (hours)',y='Water_Intake (liters)',data=data[data["Workout_Type"] == value])

  plt.title(f'Liters of Water Intake by Duration Type workout {value}')

  plt.show()

def one_encode_workout_type(workout):
  data = {
      "Yoga": 0 ,
      "HIIT" : 1 ,
      "Cardio": 2,
      "Strength":3
  }
  return data.get(workout)

def one_encode_gender(gender):
  data = {
      "Female": 0 ,
      "Male" : 1 ,

  }
  return data.get(gender)

data["Workout_Type"] = data["Workout_Type"].apply(one_encode_workout_type)
data["Gender"] = data["Gender"].apply(one_encode_gender)

# correlation_matrix = data.corr()

# plt.figure(figsize=(10, 8))

# sns.heatmap(correlation_matrix, annot=True, cmap='coolwarm', fmt='.2f')

# plt.title('Correlation Matrix', fontsize=16)

# plt.show()

data.info

data.head()

X = data.drop(columns = ["Calories_Burned"])
Y = data["Calories_Burned"]

X.head()

Y.head()

"""# feature selection"""

# Commented out IPython magic to ensure Python compatibility.
from sklearn.feature_selection import mutual_info_regression
import matplotlib.pyplot as plt
# %matplotlib inline

importances = mutual_info_regression(X, Y)
feat_importances = pd.Series(importances, data.columns[0:len(data.columns)-1])
feat_importances.plot(kind='barh', color = 'teal')
plt.show()

feat_df= feat_importances.to_frame().reset_index()

feat_df=feat_df.rename(columns= {0: 'value','index':"feature"})

feat_df

best_feature = feat_df[feat_df["value"] >= 0.1]

best_feature

best_feature_col = best_feature.feature

best_feature_col

"""#model selection"""

X = data[best_feature_col]
y = data['Calories_Burned']

from sklearn.model_selection import GridSearchCV
from sklearn.tree import DecisionTreeRegressor
from sklearn.neighbors import  KNeighborsRegressor
import numpy as np

param_dec_tree = {
    'criterion' : [ "squared_error", "friedman_mse", "absolute_error", "poisson"],
    'splitter' : ['best','random'],
    'max_depth' : np.arange(stop = 10 , step =1, start =  1),
    'min_samples_split':np.arange(stop = 10, step =1, start = 2)

}
clf_tree = GridSearchCV(DecisionTreeRegressor(),
                       param_dec_tree,
                       return_train_score=False)
clf_tree.fit(X, y)

param_knn = {
    'n_neighbors':np.arange(stop = 100, step = 1, start = 1),
     'algorithm': ['auto', 'ball_tree', 'kd_tree', 'brute'],
     'metric': ['euclidean', 'cosine','manhattan']
}
clf_knn = GridSearchCV(KNeighborsRegressor(),
                       param_knn,
                       return_train_score=False)
clf_knn.fit(X, y)

clf_knn.best_score_

clf_knn.best_params_

clf_tree.best_score_

clf_tree.best_params_

"""#split test"""

from sklearn.model_selection import train_test_split
X_train, X_test, y_train, y_test = train_test_split(
    X, y, test_size=0.1)

tree = DecisionTreeRegressor(
    criterion = 'poisson',
    max_depth = 6,
    min_samples_split = 5,
    splitter = 'random'
)
knn = KNeighborsRegressor(
   algorithm =  'auto',
   metric =  'cosine',
   n_neighbors = 14
)

tree.fit(X_train, y_train)

knn.fit(X_train,y_train)

"""# Evaluation"""

pred_knn = knn.predict(X_test)
pred_tree= tree.predict(X_test)

from sklearn.metrics import r2_score, mean_squared_error
print(f' R2score knn -> {r2_score(y_test, pred_knn)}')
print(f' R2score tree -> {r2_score(y_test, pred_tree)}')
print(f'\n MSE knn -> {mean_squared_error(y_test, pred_knn)}')
print(f' MSE tree -> {mean_squared_error(y_test, pred_tree)}')

"""# Save model"""

import pickle
filename = 'model_tree.pkl'
pickle.dump(tree, open(filename, 'wb'))

loaded_model = pickle.load(open(filename, 'rb'))
result = loaded_model.score(X_test, y_test)
print(result)