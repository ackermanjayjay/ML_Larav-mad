import os
import pickle


def load_model():
    global loaded_model
    filename = os.path.join(
        os.path.dirname(os.path.abspath(__file__)), "model_tree.pkl"
    )
    if not os.path.exists(filename):
        raise FileNotFoundError(f"Model file not found at {filename}")
    with open(filename, "rb") as f:
        loaded_model = pickle.load(f)
    return loaded_model
