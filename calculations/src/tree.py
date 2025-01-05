import pickle
import os
import numpy as np
from loadedModel import load_model


def encode_type_workout(workout):
  data = {
      0 : "Yoga" ,
      1 : "HIIT" ,
      2 : "Cardio",
      3 : "Strength"
  }
  return data.get(workout)
  
def calculation_tree(
    Weight,
    Session_Duration,
    Workout_Type,
    Water_Intake,
    Workout_Frequency,
):
    try:
        # Prepare the input data
        input_data = np.array(
            [
                [
                    Weight,
                    Session_Duration,
                    Workout_Type,
                    Water_Intake,
                    Workout_Frequency,
                ]
            ]
        )

        # Make the prediction
        result = load_model().predict(input_data)
        print("HASIL -> FastAPI working directory:", os.getcwd())

        return {
            "status": "success",
            "input": {
                "Weight": Weight,
                "Session_Duration": Session_Duration,
                "Workout_Type": encode_type_workout(Workout_Type),
                "Water_Intake": Water_Intake,
                "Workout_Frequency": Workout_Frequency,
            },
            "hasil": result[0],  # Convert to list for JSON serialization
        }

    except FileNotFoundError as e:
        return {"status": "error", "message": str(e)}

    except Exception as e:
        return {"status": "error", "message": f"An error occurred: {str(e)}"}


result = calculation_tree(88.3, 1.69, 0, 3.5, 4)
print(result)
