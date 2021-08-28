# Bet Assessment


## Installation

Run the below commands on MacOs

```make

make

```


## Cleanup


Run the below commands on MacOs

```make

make delete

```


## Bet 

Run the below commands on MacOs

```make

make bet

```

## Note 

```BetRewardConfig``` is now placed in ValueObject. Ideally this should be fetched from Database and presented in a Model. Model would be injected into the AggregateRoot.

```SymbolWeight``` is now places in ValueObject. Ideally this should be fetched from Database and presented in a Model. Model would be injected into the AggregateRoot.

```SlotBet``` The entry point of the Bet. Ideally this would be the Aggregate root