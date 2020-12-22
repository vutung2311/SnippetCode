package main

import (
	"fmt"
	"io/ioutil"
	"strconv"
	"sort"
	"strings"
)

func countSplitInversion(firstHalf []int, secondHalf []int) int {
	inversionCount := 0
	sort.Ints(firstHalf)
	sort.Ints(secondHalf)

	for len(firstHalf) > 0 && len(secondHalf) > 0 {
		if firstHalf[0] <= secondHalf[0] {
			firstHalf = firstHalf[1:]
		} else {
			secondHalf = secondHalf[1:]
			inversionCount += len(firstHalf)
		}
	}

	return inversionCount
}

func inversionCount(arr []int) int {
	arrCount := len(arr)
	if arrCount <= 1 {
		return 0
	}

	firstHalf := arr[:arrCount/2]
	secondHalf := arr[arrCount/2:]

	x := inversionCount(firstHalf)
	y := inversionCount(secondHalf)
	z := countSplitInversion(firstHalf, secondHalf)

	return x + y + z
}

func main() {
	fileContent, err := ioutil.ReadFile("IntegerArray.txt")
	if err != nil {
		panic(err)
	}
	stringArray := strings.Fields(string(fileContent))
	intArray := []int{}
	for _, v := range stringArray {
		intVal, err := strconv.Atoi(v)
		if err != nil {
			panic(err)
		}
		intArray = append(intArray, intVal)
	}
	fmt.Println(inversionCount(intArray))
}
